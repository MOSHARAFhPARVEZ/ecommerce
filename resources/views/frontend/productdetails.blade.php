@extends('frontend\frontendmaster')

@section('content')

<!-- breadcrumb_section - start
            ================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li>Product Details</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
            ================================================== -->

<!-- product_details - start
            ================================================== -->
<section class="product_details section_space pb-0">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6">
                <form action="{{ route('cart',$products->id) }}" method="POST">
                    @csrf
                <div class="product_details_image">
                    <div class="details_image_carousel">
                        <div class="slider_item">
                            <img src="{{ asset('uploads/product_photo') }}/{{ $products->photo }}"
                                alt="image_not_found" >
                        </div>
                        @foreach ($products_gals as $product_img)
                        <div class="slider_item">
                            <img src="{{ asset('uploads/gal_photo') }}/{{ $product_img->product_gallary }}"
                                alt="image_not_found">
                        </div>
                        @endforeach
                    </div>

                    <div class="details_image_carousel_nav">
                        <div class="slider_item">
                            <img src="{{ asset('uploads/product_photo') }}/{{ $products->photo }}"
                                alt="image_not_found">
                        </div>
                        @foreach ($products_gals as $product_img)
                        <div class="slider_item">
                            <img src="{{asset('uploads/gal_photo')}}/{{$product_img->product_gallary}}"
                                alt="image_not_found">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                    <input value="{{ $products->id }}" hidden name="product_id" >
                    <input value="{{ auth()->id() }}" hidden name="user_id" >

                    <div class="product_details_content">
                        <h2 class="item_title">{{ $products->product_name }}</h2>
                        <p>{{ $products->description }}</p>
                        <div class="item_review">
                            <ul class="rating_star ul_li">
                                <li><i class="fas fa-star"></i>></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <span class="review_value">3 Rating(s)</span>
                        </div>

                        <div class="item_price">
                            @if ( $products->discount_price )
                            <span>৳{{ $products->discount_price }}</span>
                            <del>৳{{ $products->regular_price }}</del>
                            @else
                            <span>৳{{ $products->regular_price }}</span>
                            @endif

                        </div>
                        <hr>

                        <div class="item_attribute">

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="select_option clearfix">
                                        <h4 class="input_title">Size *</h4>
                                        <select name="size_id" >
                                            <option data-display="- Please select -">Choose A Size</option>
                                            @foreach ($inventories as $inventory)
                                            <option value="{{ $inventory->rel_to_size->id }}">
                                                {{ $inventory->rel_to_size->size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="select_option clearfix">
                                        <h4 class="input_title">Color *</h4>
                                        <select name="color_id" >
                                            <option data-display="- Please select -">Choose A Color</option>
                                            @foreach ($inventories as $inventory)
                                            <option value="{{ $inventory->rel_to_color->id }}">
                                                {{ $inventory->rel_to_color->color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="quantity_wrap">
                            <div class="quantity_input">
                                <button type="button" class="input_number_decrement btn_d">
                                    <i class="fal fa-minus"></i>
                                </button>
                                <input class="input_number i_val" type="text" value="1" name="quantity" >
                                <button type="button" class="input_number_increment btn_i">
                                    <i class="fal fa-plus"></i>
                                </button>
                            </div>
                            <div class="total_price">
                                Total: ৳
                                <span class="total_amount">
                                    @if ( $products->discount_price )
                                    <span>{{ $products->discount_price }}</span>
                                    @else
                                    <span>{{ $products->regular_price }}</span>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <ul class="default_btns_group ul_li">
                            @if (auth()->id())
                            <li><button type="submit" class="btn btn_primary addtocart_btn">Add To Cart</button></li>
                            @else
                            <li><a class="btn btn_primary addtocart_btn" href="{{ route('accounts') }}">Add To Cart</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    </div>
                </form>
        </div>

        <div class="details_information_tab">
            <ul class="tabs_nav nav ul_li" role=tablist>
                <li>
                    <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button"
                        role="tab" aria-controls="description_tab" aria-selected="true">
                        Description
                    </button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab"
                        aria-controls="additional_information_tab" aria-selected="false">
                        Additional information
                    </button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab"
                        aria-controls="reviews_tab" aria-selected="false">
                        Reviews(2)
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                    <p>{{ $products->description }}</p>
                </div>

                <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                    <p>
                        {{ $products->addi_info }}
                    </p>
                </div>

                <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                    <div class="average_area">
                        <div class="row align-items-center">
                            <div class="col-md-12 order-last">
                                <div class="average_rating_text">
                                    <ul class="rating_star ul_li_center">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p class="mb-0">
                                        Average Star Rating: <span>4 out of 5</span> (2 vote)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="customer_reviews">
                        <h4 class="reviews_tab_title">2 reviews for this product</h4>
                        <div class="customer_review_item clearfix">
                            <div class="customer_image">
                                <img src="{{ asset('frontend_asset') }}/assets/images/team/team_1.jpg"
                                    alt="image_not_found">
                            </div>
                            <div class="customer_content">
                                <div class="customer_info">
                                    <ul class="rating_star ul_li">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star-half-alt"></i></li>
                                    </ul>
                                    <h4 class="customer_name">Aonathor troet</h4>
                                    <span class="comment_date">JUNE 2, 2021</span>
                                </div>
                                <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                            </div>
                        </div>

                        <div class="customer_review_item clearfix">
                            <div class="customer_image">
                                <img src="{{ asset('frontend_asset') }}/assets/images/team/team_2.jpg"
                                    alt="image_not_found">
                            </div>
                            <div class="customer_content">
                                <div class="customer_info">
                                    <ul class="rating_star ul_li">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star-half-alt"></i></li>
                                    </ul>
                                    <h4 class="customer_name">Danial obrain</h4>
                                    <span class="comment_date">JUNE 2, 2021</span>
                                </div>
                                <p class="mb-0">
                                    Great product quality, Great Design and Great Service.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="customer_review_form">
                        <h4 class="reviews_tab_title">Add a review</h4>
                        <form action="#">
                            <div class="form_item">
                                <input type="text" name="name" placeholder="Your name*">
                            </div>
                            <div class="form_item">
                                <input type="email" name="email" placeholder="Your Email*">
                            </div>
                            <div class="your_ratings">
                                <h5>Your Ratings:</h5>
                                <button type="button"><i class="fal fa-star"></i></button>
                                <button type="button"><i class="fal fa-star"></i></button>
                                <button type="button"><i class="fal fa-star"></i></button>
                                <button type="button"><i class="fal fa-star"></i></button>
                                <button type="button"><i class="fal fa-star"></i></button>
                            </div>
                            <div class="form_item">
                                <textarea name="comment" placeholder="Your Review*"></textarea>
                            </div>
                            <button type="submit" class="btn btn_primary">Submit Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_details - end
            ================================================== -->

<!-- related_products_section - start
            ================================================== -->
<section class="related_products_section section_space">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="best-selling-products related-product-area">
                    <div class="sec-title-link">
                        <h3>Related products</h3>
                        <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                    </div>
                    <div class="product-area clearfix">
                        @foreach ($relative_product as $relative_product)

                        @include('frontend\grid\relative_product')

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- related_products_section - end
            ================================================== -->

<!-- newsletter_section - start
            ================================================== -->
<section class="newsletter_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col col-lg-6">
                <h2 class="newsletter_title text-white">Sign Up for Newsletter </h2>
                <p>Get E-mail updates about our latest products and special offers.</p>
            </div>
            <div class="col col-lg-6">
                <form action="#!">
                    <div class="newsletter_form">
                        <input type="email" name="email" placeholder="Enter your email address">
                        <button type="submit" class="btn btn_secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<!-- newsletter_section - end
            ================================================== -->

@endsection

@push('footer_script')
<script>
    let input = document.querySelector('.i_val');
    let btn_i = document.querySelector('.btn_i');
    let btn_d = document.querySelector('.btn_d');
    let total_amount = document.querySelector('.total_amount');
    let main_total = total_amount.innerText;

    btn_i.addEventListener("click", ()=> {
        let main_value = input.value
        main_value++
        total_amount.innerText = main_value * main_total
    })
    btn_d.addEventListener("click", ()=> {
        if (input.value > 2) {
            let main_value = input.value
            main_value--
            total_amount.innerText = main_value * main_total
        } else {
            btn_d.setAttribute('disabled', 'disabled')
            // total_amount.innerText = "0"
        }
    })

</script>
@endpush
