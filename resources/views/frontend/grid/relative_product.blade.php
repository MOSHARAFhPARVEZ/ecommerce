<div class="grid">
    <div class="product-pic">
        <img src="{{ asset('uploads/product_photo') }}/{{ $relative_product->photo }}" alt>

    </div>
    <div class="details">
        <h4><a href="{{ route('productdetails',$relative_product->id) }}">{{ $relative_product->product_name }}</a></h4>
        <p><a href="{{ route('productdetails',$relative_product->id) }}">{{ $relative_product->description }} </a></p>
        <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        <span class="price">
            <ins>
                <span class="woocommerce-Price-amount amount">
                    @if ( $relative_product->discount_price )
                    <span>৳{{ $relative_product->discount_price }}</span>
                    <del>৳{{ $relative_product->regular_price }}</del>
                    @else
                    <span>৳{{ $relative_product->regular_price }}</span>
                    @endif
                </span>
            </ins>
        </span>
        <div class="add-cart-area">
            <a href="{{ route('productdetails',$relative_product->id) }}" class="add-to-cart btn btn-danger">Details</a>
        </div>
    </div>
</div>
