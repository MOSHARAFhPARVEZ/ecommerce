@extends('frontend\frontendmaster')

@section('content')

<!-- breadcrumb_section - start
		================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>About Us</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
		================================================== -->


<!-- about_section - start
		================================================== -->
<section class="about_section section_space">
    <div class="container">
        @foreach ($abouts as $about)
        <div class="row align-items-center">
            <div class="col col-md-6 order-last">
                <div class="about_image">
                    <img src="{{ asset('uploads/banner_photo') }}/{{ $about->banner_photo }}" alt="image_not_found">
                </div>
            </div>
            <div class="col col-md-6">
                <div class="about_content">
                    <h2 class="about_small_title text-uppercase">Comnay History</h2>
                    <h3 class="about_title">{{ $about->tittle }}</h3>
                    <p>
                        {{ $about->description }}
                    </p>
                    <ul class="counter_wrap ul_li">
                        <li>
                            <span class="counter">{{ $about->experience_number }}</span>
                            <small>Years Experience</small>
                        </li>
                        <li>
                            <span><strong class="counter">{{ $about->happy_customer }}</strong>K</span>
                            <small>Happy Customers</small>
                        </li>
                        <li>
                            <span><strong class="counter">{{ $about->satisfaction_per }}</strong>%</span>
                            <small>Clients Satisfaction</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- about_section - end
		================================================== -->


<!-- service_section - start
		================================================== -->
<section class="service_section bg_gray section_space">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($services as $service)
            <div class="col col-lg-4 col-md-6 col-sm-6">
                <div class="service_boxed">
                    <div class="item_icon">
                        <i class="{{ $service->icon }}"></i>
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <h3 class="item_title"> {{ $service->tittle }} </h3>
                    <p> {{ $service->description }}.</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- service_section - end
		================================================== -->


<!-- team_section - start
		================================================== -->
<section class="team_section section_space">
    <div class="container">

        <div class="row">
            <div class="col col-lg-6 col-md-8 col-sm-10">
                <div class="team_section_title">
                    <h2 class="title_text">Meet Our Team</h2>
                    <p class="mb-0">Collaboratively administrate empowered markets via plug-and-play maintain networks.
                        Dynamically usable procrastinate B2B users</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($teams as $team)
            <div class="col col-lg-3 col-md-4 col-sm-6">
                <div class="team_item">
                    <div class="team_image">
                        <img src="{{ asset('uploads/member_photo') }}/{{ $team->member_photo }}" alt="image_not_found">
                    </div>
                    <div class="team_content">
                        <h3 class="team_member_name">{{ $team->member_name }}</h3>
                        <span class="team_member_title">{{ $team->member_position }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- team_section - end
		================================================== -->



@endsection
