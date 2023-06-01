    <div class="featured-pet-card">
        <a href="#" class="nav-link">
            <div class="featured-pet-image" style="overflow: hidden">
                <img src="{{ $product->image_url }}" width="230px" alt="">
                <a href="{{route('products.addToFavourites', ['product'=>$product->id])}}">
                    <i class="{{in_array($product->id, $favourite_ids)?'fa-solid':'fa-regular'}} fa-heart favourite-icon"></i>
                </a>
            </div>
            <div class="featured-pet-content">
                <h3 class="fw-bold text-center">{{ $product->name }}</h3>
                <p class="m-0 text-center"
                    style="text-decoration: {{ $product->discountable == App\Enums\UserChoice::YES ? 'line-through' : 'none' }}">
                    ${{ $product->price }}</p>
                @if ($product->discountable == App\Enums\UserChoice::YES)
                    <p class="m-0 text-center">${{ $product->discounted_price }}</p>
                @endif
            </div>
        </a>
    </div>
