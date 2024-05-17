@extends('frontend\frontendmaster')

@section('content')



<!-- breadcrumb_section - start
            ================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>Cart</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
            ================================================== -->

<!-- cart_section - start
            ================================================== -->
<section class="cart_section section_space">
    <div class="container">

        <div class="cart_table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        {{-- <th class="text-center">Total</th> --}}
                        <th class="text-center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sub_total = 0;
                    @endphp
                    @foreach (App\Models\Cart::where('user_id', Auth::id())->get() as $cart)
                    <tr>
                        <td>
                            <div class="cart_product">
                                <img src="{{ asset('uploads/product_photo') }}/{{ $cart->rel_to_product->photo }}"
                                    alt="image_not_found">
                                <h4 class="item_title">{{ $cart->rel_to_product->product_name }}</h4>
                            </div>
                        </td>
                        <td class="text-center"><span class="price_text">
                                @if ($cart->rel_to_product->discount_price)
                                <span>৳{{ $cart->rel_to_product->discount_price }}</span>
                                @else
                                <span>৳{{ $cart->rel_to_product->regular_price }}</span>
                                @endif</span></td>
                        <td class="text-center">
                            <form action="#">
                                <div class="quantity_input">
                                    <button type="button" class="input_number_decrement">
                                        <i class="fal fa-minus"></i>
                                    </button>
                                    <input class="input_number_2" type="text" value="{{ $cart->quantity }}">
                                    <button type="button" class="input_number_increment">
                                        <i class="fal fa-plus"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                        {{-- <td class="text-center"><span class="price_text">{{ $total_dis }}</span></td> --}}
                        <td class="text-center"><a href="{{ route('cartdelete',$cart->id) }}" class="remove_btn"><i
                                    class="fal fa-trash-alt"></i></a></td>
                    </tr>
                    @php
                    if ($cart->rel_to_product->discount_price > 1) {
                        $sub_total += $cart->rel_to_product->discount_price * $cart->quantity;
                    } else {
                        $sub_total += $cart->rel_to_product->regular_price * $cart->quantity;
                    }


                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="cart_btns_wrap">
            <div class="row">
                <div class="col col-lg-6">
                    @if ($msg)
                    <div class="alert alert-danger">
                        <span>{{ $msg }}</span>
                    </div>
                    @endif
                    <form action="" method="GET">
                        <div class="coupon_form form_item mb-0">
                            <input type="text" name="coupon_name" placeholder="Coupon Code...">
                            <button type="submit" class="btn btn_dark">Apply Coupon</button>
                            <div class="info_icon">
                                <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Your Info Here"></i>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col col-lg-6">

                    @php
                    $total = 0;
                    if ($coupon_type==1) {
                    $total = $sub_total-$coupon_discount;
                    }else {
                    $total = $sub_total-$sub_total*$coupon_discount/100;
                    }
                    @endphp
                    <form action="{{ route('cartupdate') }}" method="post">
                        @csrf
                        <input class="input_number_2" type="text" hidden value="{{ $cart->quantity }}"
                            name="quantity[{{ $cart->id }}]">
                        <ul class="btns_group ul_li_right">
                            <li><button type="submit" class="btn border_black">Update Cart</button></li>
                        </ul>

                    </form>
                    <ul class="btns_group ul_li_right">
                        @php
                            session([
                                'to_tal'=>$total,
                            ]);
                        @endphp
                        <li><a class="btn btn_dark" href="{{ route('checkout') }}">Prceed To Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- <div class="col col-lg-6">
                <div class="calculate_shipping">
                    <h3 class="wrap_title">Calculate Shipping <span class="icon"><i class="far fa-arrow-up"></i></span>
                    </h3>
                    <form action="#">
                        <div class="select_option clearfix">
                            <select>
                                <option value="">Select Your Option</option>
                                <option value="1">Inside City</option>
                                <option value="2">Outside City</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn_primary rounded-pill">Update Total</button>
                    </form>
                </div>
            </div> --}}

            <div class="col col-lg-12">

                <div class="cart_total_table">
                    <h3 class="wrap_title">Cart Totals</h3>
                    <ul class="ul_li_block">
                        <li>
                            <span>Cart Subtotal</span>
                            <span>{{ $sub_total }}</span>
                        </li>
                        <li>
                            <span>Discount</span>
                            <span>{{ $coupon_discount }}</span>
                        </li>
                        {{-- <li>
                            <span>Delivery Charge</span>
                            <span>$5</span>
                        </li> --}}
                        <li>
                            <span>Order Total</span>
                            <span class="total_price">{{ $total }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cart_section - end
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
