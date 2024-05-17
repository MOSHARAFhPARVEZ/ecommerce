@extends('frontend\frontendmaster')

@section('content')

<!-- breadcrumb_section - start
            ================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>Contact Us</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
            ================================================== -->

<!-- contact_section - start
            ================================================== -->
<div class="map_section">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671"
        allowfullscreen>
    </iframe>
</div>
<!-- contact_section - end
            ================================================== -->

<!-- contact_section - start
            ================================================== -->
<section class="contact_section section_space">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6">
                <div class="contact_info_wrap">
                    <h3 class="contact_title">Address <span>Information</span></h3>
                    <div class="decoration_image">
                        <img src="{{ asset('frontend_assets') }}/assets/images/leaf.png" alt="image_not_found">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <div class="row">
                        @foreach ($contactinfos as $contactinfo)
                        <div class="col col-md-6">
                            <div class="contact_info_list">
                                <h4 class="list_title">{{ $contactinfo->bracnce_name }}</h4>
                                <ul class="ul_li_block">
                                    <li>{{ $contactinfo->location }} </li>
                                    <li>Open Time {{ $contactinfo->open_time }} </li>
                                    <li>Close Time {{ $contactinfo->close_time }} </li>
                                    <li>{{ $contactinfo->email }}</li>
                                    <li>{{ $contactinfo->phone }}</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col col-lg-6">
                <div class="contact_info_wrap">
                    <h3 class="contact_title">Get In Touch <span>Inform Us</span></h3>
                    <div class="decoration_image">
                        <img src="{{ asset('frontend_assets') }}/assets/images/leaf.png" alt="image_not_found">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>

                    <form action="{{ route('letstalk') }}" method="POST">
                        @csrf
                        {{-- all error part --}}
                        @if($errors->all())
                        <div class="col-lg-12">
                            <div class="alert alert-danger solid alert-dismissible fade show">
                                @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                                @endforeach
                                <button type="button" class="close h-100" data-dismiss="alert"
                                    aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                </button>
                            </div>
                        </div>
                        @endif
                        {{-- all error part --}}
                        {{-- message sent success msg  --}}
                        <div class="col-lg-12">
                            @if(session('success'))
                            <div class="alert alert-success solid alert-dismissible fade show">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg>
                                <strong>Success!</strong> {{session('success')}}
                                <button type="button" class="close h-100" data-dismiss="alert"
                                    aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                </button>
                            </div>
                            @endif
                        </div>
                        {{-- message sent success msg  --}}

                        <div class="form_item">
                            <input type="text" name="name" placeholder="Your Name">
                        </div>
                        <div class="row">
                            <div class="col col-md-6 col-sm-6">
                                <div class="form_item">
                                    <input type="email" name="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col col-md-6 col-sm-6">
                                <div class="form_item">
                                    <input type="text" name="subject" placeholder="Your Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form_item">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <div id="form-msg"></div>
                        <button type="submit" class="btn btn_dark">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact_section - end
            ================================================== -->

@endsection
