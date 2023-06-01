<?php

namespace App\Http\Controllers;

use App\Enums\UserChoice;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    function index(Request $request)
    {
        $data['favourite_ids']=auth()->user()?->favourites->pluck('id')->toArray() ?? [];
        $data['highlightedProducts'] = Product::where('discountable', UserChoice::YES)
        ->where('sale', UserChoice::YES)
        ->where(function($query){
            $query->orWhere('quantity','<',5);
            $query->orWhere('end_sale','<',now()->addDays(3));
        })
        ->limit(5)->get();
        $data['promotedProducts'] = Product::where('promoted', UserChoice::YES)->limit(5)->get();

        return view('pets.index', $data);
    }
}
