@extends('frontend\frontendmaster')

@section('content')

<!-- breadcrumb_section - start
            ================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>Login/Register</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
            ================================================== -->


<!-- register_section - start
            ================================================== -->
<section class="register_section section_space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <ul class="nav register_tabnav ul_li_center" role="tablist">
                    <li role="presentation">
                        <button data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab"
                            aria-controls="signin_tab" aria-selected="true">Sign In</button>
                    </li>
                    <li role="presentation">
                        <button class="active" data-bs-toggle="tab" data-bs-target="#signup_tab" type="button"
                            role="tab" aria-controls="signup_tab" aria-selected="false">Register</button>
                    </li>
                </ul>


                {{-- all error part --}}
                @if($errors->all())
                <div class="col-lg-12">
                    <div class="alert alert-danger solid alert-dismissible fade show">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                    class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                </div>
                @endif
                {{-- all error part --}}


                {{-- Customer login part --}}
                <div class="register_wrap tab-content">
                    <div class="tab-pane fade" id="signin_tab" role="tabpanel">
                        <form action="#">
                            <div class="form_item_wrap">
                                <h3 class="input_title">Email*</h3>
                                <div class="form_item">
                                    <label for="email_input"><i class="fas fa-envelope"></i></label>
                                    <input id="email_input" type="email" name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <h3 class="input_title">Password*</h3>
                                <div class="form_item">
                                    <label for="password_input"><i class="fas fa-lock"></i></label>
                                    <input id="password_input" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="checkbox_item">
                                    <input id="remember_checkbox" type="checkbox">
                                    <label for="remember_checkbox">Remember Me</label>
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <button type="submit" class="btn btn_primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                    {{-- Customer login part --}}


                    {{-- Customer Register part --}}

                    <div class="tab-pane fade show active" id="signup_tab" role="tabpanel">
                        <form action="{{ route('cusregi') }}" method="POST">
                            @csrf

                            <div class="form_item_wrap">
                                <h3 class="input_title">Name*</h3>
                                <div class="form_item">
                                    <label for="username_input2"><i class="fas fa-user"></i></label>
                                    <input id="username_input2" type="text" name="name" placeholder="Name">
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <h3 class="input_title">Email*</h3>
                                <div class="form_item">
                                    <label for="email_input"><i class="fas fa-envelope"></i></label>
                                    <input id="email_input" type="email" name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <h3 class="input_title">Password*</h3>
                                <div class="form_item">
                                    <label for="password_input2"><i class="fas fa-lock"></i></label>
                                    <input id="password_input2" type="password" name="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <h3 class="input_title">Confirm Password*</h3>
                                <div class="form_item">
                                    <label for="password_input2"><i class="fas fa-lock"></i></label>
                                    <input id="password_input2" type="password" name="password_confirmation"
                                        placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <div class="form_item">
                                    {!! NoCaptcha::display() !!}
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <button type="submit" class="btn btn_secondary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Customer Register part --}}

            </div>
        </div>
    </div>
</section>
<!-- register_section - end
            ================================================== -->


@endsection
