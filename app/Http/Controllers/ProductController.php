<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Enums\UserChoice;
use Illuminate\Http\Request;
use App\Jobs\UploadSingleFile;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function addToFavourites(Product $product)
    {
        $product->users()->syncWithoutDetaching(auth()->id());
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::paginate(10);
        $data['user'] = auth()->user();

        return view('dashboard.products/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        UploadSingleFile::dispatch('image', $product, 'product_images');
        UploadSingleFile::dispatch('file', $product, 'product_file');

        return redirect()->route('dashboard.products.index')->with('success', 'Product saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['product'] = $product;
        return view('dashboard.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        UploadSingleFile::dispatch('image', $product, 'product_images');
        UploadSingleFile::dispatch('file', $product, 'product_file');

        return redirect()->route('dashboard.products.index')->with('success', 'Product saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted!');
    }

    public function promotedProductsApi()
    {
        $data['promotedProducts'] = Product::where('promoted', UserChoice::YES)->limit(5)->get();

        return response()->json($data, 200);
    }
    public function highlightedProductsApi()
    {
        $data['highlightedProducts'] = Product::where('discountable', UserChoice::YES)
            ->where('sale', UserChoice::YES)
            ->where(function ($query) {
                $query->orWhere('quantity', '<', 5);
                $query->orWhere('end_sale', '<', now()->addDays(3));
            })
            ->limit(5)->get();
        return response()->json($data, 200);
    }
}
