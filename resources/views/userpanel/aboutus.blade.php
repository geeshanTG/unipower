@include('userpanel.includes.header')
@include('userpanel.includes.innertopbanner')

<div class="container">
    <div class="row">
        <div class="col-lg-6" data-aos="fade-up">
            <br>
            <h1 class="mb-3">{{ $whoWeAre->heading }}</h1>
            <p>{!! $whoWeAre->description_1 !!}</p>

        </div>
        <div class="col-lg-6 text-lg-end text-center" data-aos="fade-down">
            <div class="row">
                <div class="col-lg-8 home_ab_img_1">
                    <img style="width: 360px; height: 360px;" class="" src="storage/app/{{ $whoWeAre->image_1 }}" alt="">
                </div>
                <div class="offset-lg-5 col-lg-7 offset-md-5 col-md-7 d-md-block d-none">
                    <img style="width: 250px; height: 250px; margin-top: -220px;" class="" src="storage/app/{{ $whoWeAre->image_2 }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br class="d-lg-block d-none">

<div class="container" style="background-image: url({{ asset('public/frontend/images/leaf_2.png')}}); background-repeat: no-repeat; background-position: bottom right;">
    <div class="row align-items-center">
        <div class="col-lg-6 who_we_are d-lg-block d-none" data-aos="fade-down">
            <img class="w-100 m-auto" src="storage/app/{{ $whoWeAre->image_3 }}" alt="">
        </div>
        <div class="col-lg-6" data-aos="fade-up">
            <p>{!! $whoWeAre->description_2 !!}</p>
        </div>
    </div>
    <br>
    <br>
</div>

<div class="container-fluid overlay_bg"
    style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.30) 0%, rgba(0, 0, 0, 0.30) 100%), url({{ asset('public/frontend/images/planting_bg.jpg') }}); height: 300px; background-position: center; background-size: cover;">
</div>

<div class="container vision_sec">
    <div class="row" data-aos="fade-up">
        <div class="offset-lg-1 col-lg-5">
            <div class="vision_card text-center">
                <h1 class="mb-3 text-white">{{ $visionMission->vision_heading }}</h1>
                <p class="mb-0 text-white">{{ $visionMission->vision_description }}</p>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="vision_card text-center">
                <h1 class="mb-3 text-white">{{ $visionMission->mission_heading }}</h1>
                <p class="mb-0 text-white">{{ $visionMission->mission_description }}</p>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<div class="container">
    <h1>A Message from the Managing Director</h1>
    <br>
    <div class="row">
        <div class="col-lg-3 col-md-4" data-aos="fade-down">
            <img src="storage/app/{{ $ceoMessage->ceo_image }}" class="mb-0 w-100" alt="">
        </div>
        <div class="col-lg-9 col-md-8" data-aos="fade-up">
            <div class="ceo_message">
                <img src="{{ asset('public/frontend/images/quotes.png') }}" class="mb-2" style="width: 36px;" alt="">
                {!! $ceoMessage->message !!}
                <br>
                <h5 class="mb-1">{{ $ceoMessage->ceo_name }}</h5>
                <p class="mb-1 fst-italic">{{ $ceoMessage->position }}</p>
                <p class="mb-0 fw-bold">{{ $ceoMessage->company_name }}</p>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<div class="container-fluid light_bg_sec">
    <div class="container" data-aos="fade-up">
        <h1 class="text-center">Our Values</h1>
        <br>
        <div class="row">
            @foreach ($ourValues as $values)
            <div class="col-lg-3 col-md-6">
                <div class="text-center bg-white shadow p-4 value_card">
                    <img src="storage/app/{{ $values->icon }}" style="width: 50px;" alt="">
                    <h5 class="my-2" style="text-transform: uppercase">{{ $values->heading }}</h5>
                    <p>{!! $values->description !!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<br>
<br>

<div class="container" data-aos="fade-down">
    <h1 class="text-center">Our Story</h1>
    <br>
    <!-- Timeline section Start  -->
    <!-- partial:index.partial.html -->
    <section class="h--timeline js-h--timeline">
        <div class="h--timeline-container">
            <div class="h--timeline-dates">
                <div class="h--timeline-line">
                    <ol>
                        @php
                            $c = 0;
                        @endphp
                        @foreach ($ourStories as $ourStory)
                        <li><a href="#0" data-date="16/01/2014" class="h--timeline-date @if($c == 0) {{ 'h--timeline-date--selected' }}@endif">{{ $ourStory->year }}</a></li>
                        @php
                        $c++;
                        @endphp
                        @endforeach
                    </ol>

                    <span class="h--timeline-filling-line" aria-hidden="true"></span>
                </div> <!-- .h--timeline-line -->
            </div> <!-- .h--timeline-dates -->

            <nav class="h--timeline-navigation-container">
                <ul>
                    <li><a href="#0"
                            class="text-replace h--timeline-navigation h--timeline-navigation--prev h--timeline-navigation--inactive">Prev</a>
                    </li>
                    <li><a href="#0" class="text-replace h--timeline-navigation h--timeline-navigation--next">Next</a>
                    </li>
                </ul>
            </nav>
        </div> <!-- .h--timeline-container -->

        <div class="h--timeline-events">
            <ol>
                <li class="h--timeline-event h--timeline-event--selected text-component">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <div class="story_card">
                                <div class="row align-items-center ">
                                    <div class="col-lg-8 col-md-7">
                                        <h3 class="text-dark mb-3">Lorem ipsum heading</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. Lorem Ipsum is simply dummy text of the printing
                                            and typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-5">
                                        <img src="images/story_img.jpg" alt="" class="w-100 m-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="h--timeline-event text-component">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <div class="story_card">
                                <div class="row align-items-center ">
                                    <div class="col-lg-8 col-md-7">
                                        <h3 class="text-dark mb-3">Lorem ipsum heading</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. Lorem Ipsum is simply dummy text of the printing
                                            and typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-5">
                                        <img src="images/story_img.jpg" alt="" class="w-100 m-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="h--timeline-event text-component">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <div class="story_card">
                                <div class="row align-items-center ">
                                    <div class="col-lg-8 col-md-7">
                                        <h3 class="text-dark mb-3">Lorem ipsum heading</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. Lorem Ipsum is simply dummy text of the printing
                                            and typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-5">
                                        <img src="images/story_img.jpg" alt="" class="w-100 m-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="h--timeline-event text-component">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <div class="story_card">
                                <div class="row align-items-center ">
                                    <div class="col-lg-8 col-md-7">
                                        <h3 class="text-dark mb-3">Lorem ipsum heading</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. Lorem Ipsum is simply dummy text of the printing
                                            and typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-5">
                                        <img src="images/story_img.jpg" alt="" class="w-100 m-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="h--timeline-event text-component">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <div class="story_card">
                                <div class="row align-items-center ">
                                    <div class="col-lg-8 col-md-7">
                                        <h3 class="text-dark mb-3">Lorem ipsum heading</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. Lorem Ipsum is simply dummy text of the printing
                                            and typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-5">
                                        <img src="images/story_img.jpg" alt="" class="w-100 m-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="h--timeline-event text-component">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <div class="story_card">
                                <div class="row align-items-center ">
                                    <div class="col-lg-8 col-md-7">
                                        <h3 class="text-dark mb-3">Lorem ipsum heading</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. Lorem Ipsum is simply dummy text of the printing
                                            and typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-5">
                                        <img src="images/story_img.jpg" alt="" class="w-100 m-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="h--timeline-event text-component">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <div class="story_card">
                                <div class="row align-items-center ">
                                    <div class="col-lg-8 col-md-7">
                                        <h3 class="text-dark mb-3">Lorem ipsum heading</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. Lorem Ipsum is simply dummy text of the printing
                                            and typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-5">
                                        <img src="images/story_img.jpg" alt="" class="w-100 m-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="h--timeline-event text-component">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <div class="story_card">
                                <div class="row align-items-center ">
                                    <div class="col-lg-8 col-md-7">
                                        <h3 class="text-dark mb-3">Lorem ipsum heading</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. Lorem Ipsum is simply dummy text of the printing
                                            and typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-5">
                                        <img src="images/story_img.jpg" alt="" class="w-100 m-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ol>
        </div> <!-- .h--timeline-events -->
    </section>
    <!-- partial -->
    <!-- Timeline section End  -->
</div>

<br class="d-lg-block d-none">
<br>

<div class="container">
    <div class="row align-items-center" data-aos="fade-up">
        <div class="col-lg-6 col-md-6">
            <h1>Awards</h1>
            <br>
            <p>Unipower wins Gold award for "Best Agriculture Input Provider" and Silver award for "Best Emerging Agri
                Enterprise" at the National Agribusiness Awards 2015 held at BMICH on 9th August 2015.</p>
            <div class="row mx-auto">
                <div class="col-lg-6 col-md-6 col-6 text-center">
                    <div class="p-3">
                        <img src="images/award_2.png" alt="" class="m-auto mb-2 w-100">
                        <p class="fw-bold">Best Agri Input Provider Gold Award - 2015</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-6 text-center">
                    <div class="p-3">
                        <img src="images/award_2.png" alt="" class="m-auto mb-2 w-100">
                        <p class="fw-bold">Best Agri Input Provider Gold Award - 2015</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 award_winner text-lg-end">
            <img src="images/award_winner.png" alt="" class="m-auto">
        </div>
    </div>

</div>

<br class="d-lg-block d-none">
<br>

@include('userpanel.includes.footer')
