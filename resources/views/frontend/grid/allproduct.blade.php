<div class="grid">
    <div class="product-pic">
        <img src="{{ asset('uploads/product_photo') }}/{{ $product->photo }}" alt>
        @if ($product->discount_price)
        <span class="theme-badge-2"> {{ round(100-($product->discount_price/$product->regular_price)*100) }} %
            off</span>
        @endif
    </div>
    <div class="details">
        <h4><a href="{{ route('productdetails',$product->id) }}">{{ $product->product_name }}</a></h4>
        <p><a href="#">{{ Str::limit($product->description , 6) }}</a></p>
        <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        <span class="price">
            @if ($product->discount_price)
            <ins>
                <span class="woocommerce-Price-amount amount">
                    <bdi>
                        <span class="woocommerce-Price-currencySymbol">৳</span>{{ $product->discount_price }}
                    </bdi>
                </span>
            </ins>
            <del aria-hidden="true">
                <span class="woocommerce-Price-amount amount">
                    <bdi>
                        <span class="woocommerce-Price-currencySymbol">৳</span>{{ $product->regular_price }}
                    </bdi>
                </span>
            </del>
            @else
            <ins>
                <span class="woocommerce-Price-amount amount">
                    <bdi>
                        <span class="woocommerce-Price-currencySymbol">৳</span>{{ $product->regular_price }}
                    </bdi>
                </span>
            </ins>
            @endif
        </span>
        <div class="add-cart-area">
            <a href="{{ route('productdetails',$product->id) }}" class="add-to-cart btn btn-danger">Details</a>
        </div>
    </div>
</div>
