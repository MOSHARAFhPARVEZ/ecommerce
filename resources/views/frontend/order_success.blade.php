@extends('frontend\frontendmaster')

@section('content')

 <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Order Success</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- start error-404-section -->
            <section class="error-404-section section_space">
                <div class="container">
                    <div class="error-404-area">
                        <h3>Success</h3>
                        <div class="error-message">
                            <h3>Your Order Succeded</h3>
                            <a href="{{ route('index') }}" class="btn btn_primary">Back to home</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end error-404-section -->


@endsection
