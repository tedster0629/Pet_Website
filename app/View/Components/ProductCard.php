<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public Product $product;
    public $favourite_ids;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $favouriteIds)
    {
        $this->product = $product;
        $this->favourite_ids = $favouriteIds;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}
