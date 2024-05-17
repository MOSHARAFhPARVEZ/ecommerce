@extends('frontend\frontendmaster')

@section('content')

<div class="container">
    <div class="row">
        <!-- breadcrumb_section - start
    ================================================== -->
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_nav ul_li">
                    <li><a href="index.html">Home</a></li>
                    <li>Check Out</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end
    ================================================== -->


        <!-- checkout-section - start
    ================================================== -->
        <section class="checkout-section section_space">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="woocommerce bg-light p-3">
                            <form name="checkout" method="post" class="checkout woocommerce-checkout"
                                action="{{ route('checkout_store') }}">
                                @csrf

                                <div class="col2-set" id="customer_details">
                                    <div class="coll-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>
                                            <p class="form-row form-row form-row-first validate-required"
                                                id="billing_first_name_field">
                                                <label for="billing_first_name" class="">Name <abbr
                                                        class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="name"
                                                    id="billing_first_name" placeholder="" autocomplete="given-name"
                                                    value="" />
                                            </p>
                                            <p class="form-row form-row form-row-last validate-required validate-email"
                                                id="billing_email_field">
                                                <label for="billing_email" class="">Email Address <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="email" class="input-text " name="email"
                                                    id="billing_email" placeholder="" autocomplete="email" value="" />
                                            </p>
                                            <div class="clear"></div>
                                            <p class="form-row form-row form-row-first" id="billing_company_field">
                                                <label for="billing_company" class="">Company Name</label>
                                                <input type="text" class="input-text " name="company"
                                                    id="billing_company" placeholder="" autocomplete="organization"
                                                    value="" />
                                            </p>

                                            <p class="form-row form-row form-row-last validate-required validate-phone"
                                                id="billing_phone_field">
                                                <label for="billing_phone" class="">Phone <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="tel" class="input-text " name="phone"
                                                    id="billing_phone" placeholder="" autocomplete="tel" value="" />
                                            </p>
                                            <div class="clear"></div>
                                            <p class="form-row form-row form-row-first address-field update_totals_on_change validate-required"
                                                id="billing_country_field">
                                                <label for="billing_country" class="">Country <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <select name="country" id="billing_country"
                                                    autocomplete="country" class="country_to_state country_select ">
                                                    <option value="">Select a country&hellip;</option>
                                                    <option value="AX" selected='selected'>&#197;land Islands</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                </select>
                                            </p>
                                            <p class="form-row form-row form-row-last address-field update_totals_on_change validate-required"
                                                id="billing_country_field">
                                                <label for="billing_country" class="">City <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <select name="city" id="billing_country"
                                                    autocomplete="country" class="country_to_state country_select ">
                                                    <option value="">Select a City&hellip;</option>
                                                    <option value="AX" selected='selected'>&#197;land Islands</option>
                                                    <option value="AF">Washinton</option>
                                                    <option value="AL">San francisco</option>
                                                    <option value="DZ">London</option>
                                                    <option value="AS">Alaska</option>
                                                </select>
                                            </p>
                                            <p class="form-row form-row form-row-wide address-field validate-required"
                                                id="billing_address_1_field">
                                                <label for="billing_address_1" class="">Address <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="address"
                                                    id="billing_address_1" placeholder="Street address"
                                                    autocomplete="address-line1" value="" />
                                            </p>
                                        </div>
                                        <p class="form-row form-row notes" id="order_comments_field">
                                            <label for="order_comments" class="">Order Notes</label>
                                            <textarea name="notes" class="input-text " id="order_comments"
                                                placeholder="Notes about your order, e.g. special notes for delivery."
                                                rows="2" cols="5"></textarea>
                                        </p>
                                    </div>
                                </div>
                                @php
                                $sub_total = 0;
                                foreach ($carts as $cart) {
                                    if ( $cart->rel_to_product->discount_price > 1) {
                                        $sub_total += $cart->rel_to_product->discount_price * $cart->quantity;
                                    } else {
                                        $sub_total += $cart->rel_to_product->regular_price * $cart->quantity;
                                    }

                                }
                                @endphp
                                <h3 id="order_review_heading">Your order</h3>
                                <div id="order_review" class="woocommerce-checkout-review-order">
                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">
                                                        &#2547;</span>{{ $sub_total  }}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Discount</th>
                                            <td><span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol"  >
                                                        &#2547;</span>{{ $sub_total - session('to_tal') }}</span>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <td>
                                                <input  id="one" data-total="{{ session('to_tal') }}" class="charge" type="radio" name="charge" value="80" >
                                                <label for="one" class="from-label" >Inside City</label>
                                            </td>
                                            <td>
                                                <input  id="two" data-total="{{ session('to_tal') }}" class="charge" type="radio" name="charge" value="130" >
                                                <label for="two" class="from-label" >Outside City</label>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Delivery Charge</th>
                                            <td data-title="Shipping">
                                                <span class="woocommerce-Price-currencySymbol"  >
                                                &#2547;<span class="woocommerce-Price-amount amount" id="charge">0</span></span>
                                                <input type="hidden" name="shipping_method[0]" data-index="0"
                                                    id="shipping_method_0" value="free_shipping:1"
                                                    class="shipping_method" />
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong>
                                                <span class="woocommerce-Price-currencySymbol">&#2547;</span><span class="woocommerce-Price-amount amount" id="grand"  >{{ session('to_tal') }}</span></strong>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="payment" class="woocommerce-checkout-payment py-3 mt-5">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <li class="wc_payment_method payment_method_cheque mb-2">
                                                <input id="payment_method_cheque" type="radio" class="input-radio"
                                                    name="payment_method" value="1" checked='checked'
                                                    data-order_button_text="" />
                                                <!--grop add span for radio button style-->
                                                <span class='grop-woo-radio-style'></span>
                                                <!--custom change-->
                                                <label for="payment_method_cheque">Cash On Delivery</label>
                                            </li>
                                            <li class="wc_payment_method payment_method_paypal mb-2">
                                                <input id="payment_method_ssl" type="radio" class="input-radio"
                                                    name="payment_method" value="2"
                                                    data-order_button_text="Proceed to SSL Commerz" />
                                                <!--grop add span for radio button style-->
                                                <span class='grop-woo-radio-style'></span>
                                                <!--custom change-->
                                                <label for="payment_method_ssl">SSL Commerz</label>
                                            </li>
                                            <li class="wc_payment_method payment_method_paypal">
                                                <input id="payment_method_stripe" type="radio" class="input-radio"
                                                    name="payment_method" value="3"
                                                    data-order_button_text="Proceed to SSL Commerz" />
                                                <!--grop add span for radio button style-->
                                                <span class='grop-woo-radio-style'></span>
                                                <!--custom change-->
                                                <label for="payment_method_stripe">Stripe Payment</label>

                                            </li>
                                        </ul>
                                        <input type="hidden" name="discount" value="{{ $sub_total - session('to_tal')}}" >
                                        <input type="hidden" name="total" value="{{ session('to_tal')}}" >
                                        <input type="hidden" name="coustomer_id" value="{{ Auth::id() }}" >
                                        <div class="form-row place-order">
                                            <noscript>
                                                Since your browser does not support JavaScript, or it is disabled,
                                                please ensure you click the <em>Update Totals</em> button before placing
                                                your order. You may be charged more than the amount stated above if you
                                                fail to do so.
                                                <br />
                                                <input type="submit" class="button alt"
                                                    name="woocommerce_checkout_update_totals" value="Update totals" />
                                            </noscript>
                                            <input type="submit" class="button alt" id="place_order"
                                                value="Place order" data-value="Place order" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- checkout-section - end
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
    </div>
</div>

@endsection

@push('footer_script')
<script>
    $('.charge').click(function(){
        var charge = $(this).val();
        var sub_total = $(this).attr('data-total');
        var grand_total = parseInt(sub_total) + parseInt(charge);
        $('#charge').html(charge);
        $('#grand').html(grand_total);
    })
</script>
@endpush
