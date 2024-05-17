@extends('frontend\frontendmaster')

@section('content')

<!-- breadcrumb_section - start
            ================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li>Product Grid</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
            ================================================== -->

<!-- product_section - start
            ================================================== -->
<section class="product_section section_space">
    <h2 class="hidden">Product sidebar</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <aside class="sidebar_section p-0 mt-0">
                    <div class="sb_widget sb_category">
                        <h3 class="sb_widget_title">Categories</h3>
                        <ul class="sb_category_list ul_li_block">
                            <li>
                                <a href="#!">Official electronic <span></span></a>
                            </li>
                            <li>
                                <a href="#!">Dell <span>(1375)</span></a>
                            </li>
                            <li>
                                <a href="#!">Asus <span>(1687)</span></a>
                            </li>
                            <li>
                                <a href="#!">HP <span>(1036)</span></a>
                            </li>
                            <li>
                                <a href="#!">Acer <span>(202)</span></a>
                            </li>
                            <li>
                                <a href="#!">Aivta <span>(525)</span></a>
                            </li>
                            <li>
                                <a href="#!">HP <span>(135)</span></a>
                            </li>
                            <li>
                                <a href="#!">Apple <span>(298)</span></a>
                            </li>
                            <li>
                                <a href="#!"><span>All Categories</span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="sb_widget">
                        <h3 class="sb_widget_title">Your Filter</h3>
                        <div class="filter_sidebar">
                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Category</h3>
                                <form action="#">
                                    <div class="select_option clearfix">
                                        <select>
                                            <option data-display="Select Category">Select Your Option</option>
                                            <option value="1" selected>HP</option>
                                            <option value="2">HP</option>
                                            <option value="3">HP</option>
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Manufacturer</h3>
                                <form action="#">
                                    <ul class="fs_brand_list ul_li_block">
                                        <li>
                                            <div class="checkbox_item">
                                                <input id="apple_brand" type="checkbox" name="brand_checkbox" />
                                                <label for="apple_brand">Apple <span>(19)</span></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox_item">
                                                <input id="asus_brand" type="checkbox" name="brand_checkbox" />
                                                <label for="asus_brand">Asus <span>(1)</span></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox_item">
                                                <input id="bank_oluvsen_brand" type="checkbox" name="brand_checkbox" />
                                                <label for="bank_oluvsen_brand">Bank & Oluvsen <span>(1)</span></label>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>

                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Filter by Color</h3>
                                <ul class="filter_memory_list ul_li_block">
                                    <li>
                                        <a href="#!">Red <span>(12)</span></a>
                                    </li>
                                    <li>
                                        <a href="#!">Green<span>(12)</span></a>
                                    </li>
                                    <li>
                                        <a href="#!">Blue<span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#!">Yellow<span>(7)</span></a>
                                    </li>
                                    <li>
                                        <a href="#!">Black<span>(9)</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-lg-9">
                <div class="filter_topbar">
                    <div class="row align-items-center">
                        <div class="col col-md-4">
                            <ul class="layout_btns nav" role="tablist">
                                <li>
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#home" type="button"
                                        role="tab" aria-controls="home" aria-selected="true"><i
                                            class="fal fa-bars"></i></button>
                                </li>
                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">
                                        <i class="fal fa-th-large"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="col col-md-4">
                            <form action="#">
                                <div class="select_option clearfix">
                                    <select>
                                        <option data-display="Defaul Sorting">Select Your Option</option>
                                        <option value="1">Sorting By Name</option>
                                        <option value="2">Sorting By Price</option>
                                        <option value="3">Sorting By Size</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="col col-md-4">
                            <div class="result_text">Showing 1-12 of 30 relults</div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <div class="shop-product-area shop-product-area-col">
                            <div class="product-area shop-grid-product-area clearfix">
                                @foreach ($products as $product)
                                @include('frontend\grid\allproduct')
                                @endforeach

                            </div>
                        </div>

                        <div class="pagination_wrap">
                            <ul class="pagination_nav">
                                <li class="active"><a href="#!">01</a></li>
                                <li><a href="#!">02</a></li>
                                <li><a href="#!">03</a></li>
                                <li class="prev_btn">
                                    <a href="#!"><i class="fal fa-angle-left"></i></a>
                                </li>
                                <li class="next_btn">
                                    <a href="#!"><i class="fal fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="product_layout2_wrap">
                            <div class="product-area-row">
                                @foreach ($products as $product)
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="{{ asset('uploads/product_photo') }}/{{ $product->photo }}" alt>
                                        @if ($product->discount_price)
                                        <span class="theme-badge-2">
                                            {{ round(100-($product->discount_price/$product->regular_price)*100) }} %
                                            off</span>
                                        @endif
                                    </div>
                                    <div class="details">
                                        <h4><a
                                                href="{{ route('productdetails',$product->id) }}">{{ $product->product_name }}</a>
                                        </h4>
                                        <p><a href="#">{{ Str::limit($product->description) }}</a></p>
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
                                                        <span
                                                            class="woocommerce-Price-currencySymbol">৳</span>{{ $product->discount_price }}
                                                    </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span
                                                            class="woocommerce-Price-currencySymbol">৳</span>{{ $product->regular_price }}
                                                    </bdi>
                                                </span>
                                            </del>
                                            @else
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span
                                                            class="woocommerce-Price-currencySymbol">৳</span>{{ $product->regular_price }}
                                                    </bdi>
                                                </span>
                                            </ins>
                                            @endif
                                        </span>
                                        <div class="add-cart-area">
                                            <a href="{{ route('productdetails',$product->id) }}"
                                                class="add-to-cart btn btn-danger">Details</a>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>

                        <div class="pagination_wrap">
                            <ul class="pagination_nav">
                                <li class="active"><a href="#!">01</a></li>
                                <li><a href="#!">02</a></li>
                                <li><a href="#!">03</a></li>
                                <li class="prev_btn">
                                    <a href="#!"><i class="fal fa-angle-left"></i></a>
                                </li>
                                <li class="next_btn">
                                    <a href="#!"><i class="fal fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_section - end
            ================================================== -->

@endsection
