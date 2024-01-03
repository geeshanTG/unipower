@include('userpanel.includes.header')
<!-- =======================Desktop Slider Start==========================  -->

<!-- slider section -->
<div class="d-md-block d-none">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner main_slider">
            @php
                $c = 0;
            @endphp
            @foreach ($mainSliders as $slider)
                <div class="carousel-item @if ($c == 0) {{ 'active' }} @endif">
                    <div class="bg_img_fill"
                        style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(storage/app/{{ $slider->desktop_image }}); height: 600px;">
                    </div>
                    <div class="container carousel-caption">
                        <div class="slider_image_caption">
                            <div class="col-lg-8">
                                <h5 style="text-transform: uppercase;">{{ $slider->heading }}</h5>
                                <!-- <br>
                    <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $c++;
                @endphp
            @endforeach
        </div>

        <div class="container carousel-indicators">
            @php
                $c = 0;
            @endphp
            @foreach ($mainSliders as $slider)
                <button type="button" data-bs-target="#carouselExampleCaptions"
                    class="@if ($c == 0) {{ 'active' }} @endif carousel_indi"
                    data-bs-slide-to="{{ $c }}"
                    @if ($c == 0) {{ 'aria-current=true' }} @endif
                    aria-label="Slide {{ $c + 1 }}">
                    <div class="row mx-auto align-items-center px-3">
                        <div class="col-lg-3 col-md-3">
                            <img src="storage/app/{{ $slider->icon }}" style="width: 45px;" class="m-auto"
                                alt="">
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                                <h6 class="mb-1">{{ $slider->sub_heading }}</h6>
                                {{-- <h6 class="mb-0">Nutrients</h6> --}}
                            </div>
                        </div>
                    </div>
                </button>
                @php
                    $c++;
                @endphp
            @endforeach
        </div>
    </div>
</div>
<!-- slider section -->

<!-- =======================Desktop Slider End==========================  -->

<!-- =======================Mobile Slider Start==========================  -->

<!-- slider section -->
<div class="d-md-none d-block">
    <div id="carouselExampleCaptions_mob" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner main_slider">
            @php
                $c = 0;
            @endphp
            @foreach ($mainSliders as $slider)
                <div class="carousel-item @if ($c == 0) {{ 'active' }} @endif">
                    <div class="bg_img_fill"
                        style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(storage/app/{{ $slider->desktop_image }}); height: 600px;">
                    </div>
                    <div class="container carousel-caption">
                        <div class="slider_image_caption">
                            <div class="col-lg-8">
                                <h5>{{ $slider->heading }}</h5>
                                <!-- <br>
                      <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container carousel-indicators">
            @php
                $c = 0;
            @endphp
            @foreach ($mainSliders as $slider)
                <button type="button" data-bs-target="#carouselExampleCaptions_mob"
                    class="@if ($c == 0) {{ 'active' }} @endif carousel_indi"
                    data-bs-slide-to="{{ $c }}"
                    @if ($c == 0) {{ 'aria-current=true' }} @endif
                    aria-label="Slide {{ $c + 1 }}">
                    <div class="row mx-auto align-items-center px-3">
                        <div class="col-lg-3 col-md-3">
                            <img src="{{ asset('storage/app') . '/' . $slider->icon }}" style="width: 45px;"
                                class="m-auto" alt="">
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                                <h6 class="mb-1">{{ $slider->sub_heading }}</h6>
                                {{-- <h6 class="mb-0">Nutrients</h6> --}}
                            </div>
                        </div>
                    </div>
                </button>
                @php
                    $c++;
                @endphp
            @endforeach
        </div>
    </div>
</div>
<!-- slider section -->

<!-- =======================Mobile Slider End==========================  -->


<br>
<br class="d-lg-block d-none">

<div class="container"
    style="background-image: url({{ asset('public/frontend/images/leaf_2.png') }}); background-repeat: no-repeat; background-position: bottom right;">
    <div class="row flex-lg-row flex-column-reverse">
        <div class="col-lg-6 bg_img_none text-center" data-aos="fade-up">
            <!-- style="background-image: url(images/leaf_1.png); background-repeat: no-repeat; background-position: top right;" -->
            <div class="row">
                <div class="col-lg-8 home_ab_img_1">
                    <img style="width: 360px; height: 360px;" class="" src="storage/app/{{ $about->image_1 }}"
                        alt="">
                </div>
                <div class="offset-lg-5 col-lg-7 offset-md-5 col-md-7 d-md-block d-none">
                    <img style="width: 250px; height: 250px; margin-top: -220px;" class=""
                        src="storage/app/{{ $about->image_2 }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6" data-aos="fade-down">
            <br>
            <h1 class="mb-3">{{ $about->heading }}</h1>
            <h5 style="color: #00732E;">{{ $about->sub_heading }}</h5>
            {!! $about->description !!}
            <a class="btn btn_main rounded-0" href="{{ url('about-us') }}">Explore More</a>

            <div class="mt-3 overview_partner_slider">
                <div class="slider">
                    <div class="owl-carousel first_client_slider">
                        @foreach ($partners as $partner)
                            <div class="slider-card client_logos">
                                <div class="text-center">
                                    <img class="mx-auto" src="{{ asset('storage/app/') . '/' . $partner->image }}"
                                        alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>

<div class="container-fluid py-3" style="background-color: #F5DEB3;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up">
                <div class="row align-items-center counters_sec">
                    <div class="col-lg-5 col-5 text-end counter_val">
                        <p>{{ $middleBanner->count_1 }}+</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="wrapWord fw-bold">{{ $middleBanner->heading_1 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-down">
                <div class="row align-items-center counters_sec">
                    <div class="col-lg-5 col-5 text-end counter_val">
                        <p>{{ $middleBanner->count_2 }}+</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="wrapWord fw-bold">{{ $middleBanner->heading_2 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up">
                <div class="row align-items-center counters_sec">
                    <div class="col-lg-5 col-5 text-end counter_val">
                        <p>{{ $middleBanner->count_3 }}+</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="wrapWord fw-bold">{{ $middleBanner->heading_3 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-down">
                <div class="row align-items-center counters_sec">
                    <div class="col-lg-5 col-5 text-end counter_val">
                        <p>{{ $middleBanner->count_4 }}+</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="wrapWord fw-bold">{{ $middleBanner->heading_4 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<div class="container">
    <h1 class="text-center">Our Core Products</h1>
    <br>
    <div class="row">
        <?php
            for($i=1; $i<=4; $i++) {
                foreach($mainCategories as $mainCategory) {

                    $columnName = 'main_category_id_' . $i;

                    if($mainCategory->id == $coreProducts->$columnName) {

                        $mainCatName = preg_replace('/\s+/', '-', $mainCategory->heading);
                        $catName = strtolower($mainCatName);
        ?>
        <div class="col-lg-3 col-md-6" data-aos="<?php if ($i == 1 || $i == 3) {
            echo 'fade-up';
        } elseif ($i == 2 || $i == 4) {
            echo 'fade-down';
        } ?>">
            <?php if ($i == 2) {
                echo '<br class="d-lg-block d-md-none">';
            } elseif ($i == 3) {
                echo '<br class="d-lg-none d-md-block">';
            } elseif ($i == 4) {
                echo '<br>';
            } ?>
            <a href="{{ url('product-categories') . '/' . $catName }}">
                <div class="prod_card"
                    style="background: linear-gradient(64deg, #C15233 0%, rgba(193, 82, 51, 0.96) 17%, rgba(193, 82, 51, 0) 58%), url({{ asset('storage/app/') . '/' . $mainCategory->image }})">
                    <div class="col-xxl-6 col-lg-9">
                        <h3 class="text-white"> {{ $mainCategory->heading }} </h3>
                    </div>
                </div>
            </a>
        </div>
        <?php } } } ?>
    </div>
    <br>
    <div class="text-end">
        <a href="{{ url('products') }}" class="text_link">View All &nbsp;<i class="fa fa-arrow-right"
                aria-hidden="true"></i></a>
    </div>
</div>
<br>
<br>

<div class="container">
    <h1 class="text-center">Our Services</h1>
    <br>
    <div class="row">
        <div class="slider" data-aos="fade-up">
            <div class="owl-carousel serv_caro">
                <?php
                    for($i=1; $i<=4; $i++) {
                        foreach($services as $service) {

                            $columnName = 'service_id_' . $i;
                            if($service->id == $ourServices->$columnName) {

                                $serviceName = preg_replace('/\s+/', '-', $service->heading);
                                $serName = strtolower($serviceName);
                                $encryptedId = encrypt($service->id);
                ?>
                <div class="slider-card">
                    <div class="serv_img mb-2">
                        <img src="{{ asset('storage/app') . '/' . $service->image_1 }}" alt="">
                    </div>
                    <div class="serv_detail_card text-center">
                        <a class="" href="{{ url('service-detail') . '/' . $serName . '/' . $encryptedId }}">
                            <h5>{{ $service->heading }}</h5>
                            <p class="mb-0">{{ $service->short_description }} </p>
                            <div class="go-corner" href="{{ url('service') . '/' . $serName . '/' . $encryptedId }}">
                                <div class="go-arrow">→</div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } } } ?>
            </div>
        </div>
    </div>
    <div class="text-end mt-2">
        <a href="{{ route('services') }}" class="text_link">View All &nbsp;<i class="fa fa-arrow-right"
                aria-hidden="true"></i></a>
    </div>
</div>
<br>
<br>

<div class="container-fluid light_bg_sec">
    <div class="container">
        <h1 class="text-center">Industry Insights and News</h1>
        <br>
        <div class="row">
            <?php
                for($i=1; $i<=4; $i++) {
                    foreach($news as $new) {
                        $columnName = 'news_id_' . $i;
                        if($new->id == $industryInsights->$columnName) {

                            $newsName = preg_replace('/\s+/', '-', $new->heading);
                            $newName = strtolower($newsName);
                            $encryptedId = encrypt($new->id);

            ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12"
                data-aos="@if ($i == 1 || $i == 3) {{ 'fade-up' }}@else{{ 'fade-down' }} @endif">
                <div class="card blog_card border-0 rounded-0">
                    <img src="{{ asset('storage/app') . '/' . $new->image_1 }}" class="card-img-top rounded-0"
                        alt="...">
                    <div class="card-body bg-white">
                        <h5 class="card-title">{{ $new->heading }}</h5>
                        <p class="card-text">{!! Str::limit($new->description, 100) !!} ...</p>
                        <a href="{{ url('news-detail') . '/' . $newName . '/' . $encryptedId }}"
                            class="text_link">Read More &nbsp;<i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <?php
                } } }
            ?>
        </div>
        <br class="d-md-block d-none">
        <div class="text-end">
            <a href="{{ route('news') }}" class="text_link">View All &nbsp;<i class="fa fa-arrow-right"
                    aria-hidden="true"></i></a>
        </div>
    </div>
</div>
<br>
<br>

<div class="container">
    <h1 class="text-center">Our Trusted Partners</h1>
    <br>
    <div class="row">
        <div class="slider" data-aos="fade-up">
            <div class="owl-carousel client_slider">
                @foreach ($partners as $partner)
                    <div class="slider-card client_logos">
                        <div class="text-center">
                            <img class="mx-auto" src="{{ asset('storage/app/') . '/' . $partner->image }}"
                                alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid sec_padding"
    style="background-image: url({{ asset('public/frontend/images/invest_bg.png') }}); background-repeat: no-repeat; background-size: cover;">
    <div class="container" data-aos="fade-down">
        <h1 class="text-center heading_main text-white mb-4">{{ $bottomBanner->heading }}</h1>
        <div class="col-lg-8 offset-lg-2 text-center">
            <p class="text-white">{{ $bottomBanner->description }}</p>
        </div>
    </div>
</div>

<div class="container-fluid sec_padding faq_con_sec"
    style="background-image: url({{ asset('public/frontend/images/dark_bg.jpg') }}); background-repeat: no-repeat; background-size: cover;">
    <div class="container fluid_contain">
        <div class="row faq_con_row" id="home-enquiry">


            <div class="col-lg-6 faq_sec">
                <h1 class="">FAQ’s</h1>
                <br>
                <div data-aos="fade-up">
                    <div class="accordion" id="accordionExample">
                        @php
                            $c = 0;
                        @endphp
                        @foreach ($faqs as $faq)
                            @php
                                $c++;
                            @endphp
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading_{{ $c }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse_{{ $c }}"
                                        aria-expanded="@if ($c == 1) {{ 'true' }}@else{{ 'false' }} @endif"
                                        aria-controls="collapse_{{ $c }}">
                                        {{ $faq->heading }}
                                    </button>
                                </h2>
                                <div id="collapse_{{ $c }}"
                                    class="accordion-collapse collapse @if ($c == 1) {{ 'show' }} @endif"
                                    aria-labelledby="heading_{{ $c }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{ $faq->description }} </p>
                                    </div>
                                </div>
                            </div>
                            @php
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6 contact_sec">
                <h1 class="text-white">Get in Touch</h1>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Please submit again!</strong><br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div id="success-message" class="alert alert-success text-center">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ($errors->has('token'))
                    <span class="text-danger">{{ $errors->first('token') }}</span>
                @endif
                <br>
                <div class="contact_form" data-aos="fade-down" id="my-form">
                    <form id="inquiry_form" name="inquiry_form" action="{{ route('save-enquiry') }}"
                        enctype="multipart/form-data" method="post" class="smart-form inquiry_form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="text" class="form-control  mb-3" name="name"
                                    placeholder="Enter your name" required>

                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="email" class="form-control  mb-3 @error('email') is-invalid @enderror"
                                    name="email" placeholder="Enter your email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="tel" class="form-control  mb-3 @error('phone') is-invalid @enderror"
                                    name="phone" placeholder="Enter your phone number" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <script>
                                        document.getElementById('my-form').scrollIntoView({
                                            behavior: 'smooth'
                                        });
                                    </script>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="text"
                                    class="form-control  mb-3 @error('subject') is-invalid @enderror" name="subject"
                                    placeholder="Type the subject" required>
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  
                                @enderror
                            </div>
                            <div class="col-lg-12 col-12">
                                <textarea placeholder="Type your message here..."
                                    class="form-control h-auto mb-3 @error('message') is-invalid @enderror" name="message"
                                    id="exampleFormControlTextarea1" rows="6" required></textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  
                                @enderror
                            </div>

                            <div class="text-start contact_submit">
                                <input type="hidden" name="segment" value="home">
                                <button type="submit" class="btn btn_main rounded-0">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('userpanel.includes.footer')
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>

