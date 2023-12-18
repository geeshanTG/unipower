@include('userpanel.includes.header')
<!-- =======================Desktop Slider Start==========================  -->

<!-- slider section -->
<div class="d-md-block d-none">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner main_slider">
            <div class="carousel-item active">
                <div class="bg_img_fill"
                    style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(./images/slider01.jpg); height: 600px;">
                </div>
                <div class="container carousel-caption">
                    <div class="slider_image_caption">
                        <div class="col-lg-8">
                            <h5>Empowering Agriculture, Enriching Lives</h5>
                            <!-- <br>
                    <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg_img_fill"
                    style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(./images/slider03.jpg); height: 600px;">
                </div>
                <div class="container carousel-caption">
                    <div class="slider_image_caption">
                        <div class="col-lg-8">
                            <h5>Empowering Agriculture, Enriching Lives</h5>
                            <!-- <br>
                    <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg_img_fill"
                    style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(./images/slider04.jpg); height: 600px;">
                </div>
                <div class="container carousel-caption">
                    <div class="slider_image_caption">
                        <div class="col-lg-8">
                            <h5>Empowering Agriculture, Enriching Lives</h5>
                            <!-- <br>
                    <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg_img_fill"
                    style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(./images/slider02.jpg); height: 600px;">
                </div>
                <div class="container carousel-caption">
                    <div class="slider_image_caption">
                        <div class="col-lg-8">
                            <h5>Empowering Agriculture, Enriching Lives</h5>
                            <!-- <br>
                    <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                class="active carousel_indi" aria-current="true" aria-label="Slide 1">
                <div class="row mx-auto align-items-center px-3">
                    <div class="col-lg-3 col-md-3">
                        <img src="images/potted-plant.png" style="width: 45px;" class="m-auto" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                            <h6 class="mb-1">Specialty Plant</h6>
                            <h6 class="mb-0">Nutrients</h6>
                        </div>
                    </div>
                </div>
            </button>
            <button type="button" data-bs-target="#carouselExampleCaptions" class="carousel_indi" data-bs-slide-to="1"
                aria-label="Slide 2">
                <!-- <h6 class="mb-0">Responsible Agri Solutions</h6>
              <h6>Provider</h6> -->
                <div class="row mx-auto align-items-center px-3">
                    <div class="col-lg-3 col-md-3">
                        <img src="images/planting.png" style="width: 45px;" class="m-auto" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                            <h6 class="mb-1">Responsible Agri</h6>
                            <h6 class="mb-0">Solutions</h6>
                        </div>
                    </div>
                </div>
            </button>
            <button type="button" data-bs-target="#carouselExampleCaptions" class="carousel_indi" data-bs-slide-to="2"
                aria-label="Slide 3">
                <!-- <h6 class="mb-0">Advancing</h6>
              <h6>Productivity</h6> -->
                <div class="row mx-auto align-items-center px-3">
                    <div class="col-lg-3 col-md-3">
                        <img src="images/bulb.png" style="width: 45px;" class="m-auto" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                            <h6 class="mb-1">Advancing</h6>
                            <h6 class="mb-0">Productivity</h6>
                        </div>
                    </div>
                </div>
            </button>
            <button type="button" data-bs-target="#carouselExampleCaptions" class="carousel_indi" data-bs-slide-to="3"
                aria-label="Slide 4">
                <!-- <h6 class="mb-0">Sustainability and</h6>
              <h6>Prosperity</h6> -->
                <div class="row mx-auto align-items-center px-3">
                    <div class="col-lg-3 col-md-3">
                        <img src="images/replant.png" style="width: 45px;" class="m-auto" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                            <h6 class="mb-1">Sustainability and</h6>
                            <h6 class="mb-0">Prosperity</h6>
                        </div>
                    </div>
                </div>
            </button>
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
            <div class="carousel-item active">
                <div class="bg_img_fill"
                    style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(./images/slider01_mob.jpg); height: 600px;">
                </div>
                <div class="container carousel-caption">
                    <div class="slider_image_caption">
                        <div class="col-lg-8">
                            <h5>Empowering Agriculture, Enriching Lives</h5>
                            <!-- <br>
                      <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg_img_fill"
                    style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(./images/slider03_mob.jpg); height: 600px;">
                </div>
                <div class="container carousel-caption">
                    <div class="slider_image_caption">
                        <div class="col-lg-8">
                            <h5>Empowering Agriculture, Enriching Lives</h5>
                            <!-- <br>
                      <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg_img_fill"
                    style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(./images/slider04_mob.jpg); height: 600px;">
                </div>
                <div class="container carousel-caption">
                    <div class="slider_image_caption">
                        <div class="col-lg-8">
                            <h5>Empowering Agriculture, Enriching Lives</h5>
                            <!-- <br>
                      <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg_img_fill"
                    style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.45) 100%), url(./images/slider02_mob.jpg); height: 600px;">
                </div>
                <div class="container carousel-caption">
                    <div class="slider_image_caption">
                        <div class="col-lg-8">
                            <h5>Empowering Agriculture, Enriching Lives</h5>
                            <!-- <br>
                      <img src="images/partner_logos.png" class="m-auto" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions_mob" data-bs-slide-to="0"
                class="active carousel_indi" aria-current="true" aria-label="Slide 1">
                <div class="row mx-auto align-items-center px-3">
                    <div class="col-lg-3 col-md-3">
                        <img src="images/potted-plant.png" style="width: 45px;" class="m-auto" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                            <h6 class="mb-1">Specialty Plant</h6>
                            <h6 class="mb-0">Nutrients</h6>
                        </div>
                    </div>
                </div>
            </button>
            <button type="button" data-bs-target="#carouselExampleCaptions_mob" class="carousel_indi"
                data-bs-slide-to="1" aria-label="Slide 2">
                <!-- <h6 class="mb-0">Responsible Agri Solutions</h6>
                <h6>Provider</h6> -->
                <div class="row mx-auto align-items-center px-3">
                    <div class="col-lg-3 col-md-3">
                        <img src="images/planting.png" style="width: 45px;" class="m-auto" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                            <h6 class="mb-1">Responsible Agri</h6>
                            <h6 class="mb-0">Solutions</h6>
                        </div>
                    </div>
                </div>
            </button>
            <button type="button" data-bs-target="#carouselExampleCaptions_mob" class="carousel_indi"
                data-bs-slide-to="2" aria-label="Slide 3">
                <!-- <h6 class="mb-0">Advancing</h6>
                <h6>Productivity</h6> -->
                <div class="row mx-auto align-items-center px-3">
                    <div class="col-lg-3 col-md-3">
                        <img src="images/bulb.png" style="width: 45px;" class="m-auto" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                            <h6 class="mb-1">Advancing</h6>
                            <h6 class="mb-0">Productivity</h6>
                        </div>
                    </div>
                </div>
            </button>
            <button type="button" data-bs-target="#carouselExampleCaptions_mob" class="carousel_indi"
                data-bs-slide-to="3" aria-label="Slide 4">
                <!-- <h6 class="mb-0">Sustainability and</h6>
                <h6>Prosperity</h6> -->
                <div class="row mx-auto align-items-center px-3">
                    <div class="col-lg-3 col-md-3">
                        <img src="images/replant.png" style="width: 45px;" class="m-auto" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="d-flex flex-column align-items-start text-start caro_indi_text">
                            <h6 class="mb-1">Sustainability and</h6>
                            <h6 class="mb-0">Prosperity</h6>
                        </div>
                    </div>
                </div>
            </button>
        </div>
    </div>
</div>
<!-- slider section -->

<!-- =======================Mobile Slider End==========================  -->


<br>
<br class="d-lg-block d-none">

<div class="container"
    style="background-image: url(images/leaf_2.png); background-repeat: no-repeat; background-position: bottom right;">
    <div class="row flex-lg-row flex-column-reverse">
        <div class="col-lg-6 bg_img_none text-center" data-aos="fade-up">
            <!-- style="background-image: url(images/leaf_1.png); background-repeat: no-repeat; background-position: top right;" -->
            <div class="row">
                <div class="col-lg-8 home_ab_img_1">
                    <img style="width: 360px; height: 360px;" class="" src="images/about_img.png" alt="">
                </div>
                <div class="offset-lg-5 col-lg-7 offset-md-5 col-md-7 d-md-block d-none">
                    <img style="width: 250px; height: 250px; margin-top: -220px;" class="" src="images/about_img_2.jpg"
                        alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6" data-aos="fade-down">
            <br>
            <h1 class="mb-3">Unipower</h1>
            <h5 style="color: #00732E;">Your Partner in Innovative Agriculture Solutions</h5>
            <p>Unipower Private Limited, founded in April 1988 by a pioneering entrepreneur in the field of
                agriculture, Mr. Jayantha Rajapakse, revolutionized and changed the landscape of agriculture in Sri
                Lanka forever. This led to the introduction of a more effective and efficient alterative to
                conventional fertilizers for root filling - Specialty Fertilizers rich in plant nutrients, for the
                very first time.
            </p>
            <p>As the pioneering organization for Specialty Fertilizers, we have continually delivered on our
                commitment to increasing the overall yield and
                enhancing the quality of yleld in Sri Lanka, by providing local farmers and crop producers the very
                best fertilizers from around the world.</p>
            <button type="button" class="btn btn_main rounded-0">Explore More</button>

            <div class="mt-3 overview_partner_slider">
                <div class="slider">
                    <div class="owl-carousel first_client_slider">
                        <div class="slider-card client_logos">
                            <div class="text-center">
                                <img class="mx-auto" src="images/logo_1.jpg" alt="">
                            </div>
                        </div>
                        <div class="slider-card client_logos">
                            <div class="text-center">
                                <img class="m-auto" src="images/logo_2.jpg" alt="">
                            </div>
                        </div>
                        <div class="slider-card client_logos">
                            <div class="text-center">
                                <img class="m-auto" src="images/logo_3.jpg" alt="">
                            </div>
                        </div>
                        <div class="slider-card client_logos">
                            <div class="text-center">
                                <img class="m-auto" src="images/logo_4.jpg" alt="">
                            </div>
                        </div>
                        <div class="slider-card client_logos">
                            <div class="text-center">
                                <img class="m-auto" src="images/logo_5.jpg" alt="">
                            </div>
                        </div>
                        <div class="slider-card client_logos">
                            <div class="text-center">
                                <img class="m-auto" src="images/logo_6.jpg" alt="">
                            </div>
                        </div>
                        <div class="slider-card client_logos">
                            <div class="text-center">
                                <img class="m-auto" src="images/logo_7.jpg" alt="">
                            </div>
                        </div>
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
                        <p>106+</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="fw-bold">Agriculture</p>
                        <p class="fw-bold">Products</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-down">
                <div class="row align-items-center counters_sec">
                    <div class="col-lg-5 col-5 text-end counter_val">
                        <p>408+</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="fw-bold">Projects</p>
                        <p class="fw-bold">Completed</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up">
                <div class="row align-items-center counters_sec">
                    <div class="col-lg-5 col-5 text-end counter_val">
                        <p>730+</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="fw-bold">Satisfied</p>
                        <p class="fw-bold">Customers</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-down">
                <div class="row align-items-center counters_sec">
                    <div class="col-lg-5 col-5 text-end counter_val">
                        <p>200+</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="fw-bold">Expert</p>
                        <p class="fw-bold">Farmers</p>
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
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
            <a href="">
                <div class="prod_card"
                    style="background: linear-gradient(64deg, #C15233 0%, rgba(193, 82, 51, 0.96) 17%, rgba(193, 82, 51, 0) 58%), url(./images/prod_3.jpg)">
                    <div class="col-xxl-6 col-lg-9">
                        <h3 class="text-white">Specialty Plant Nutrients</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-down">
            <br class="d-lg-block d-md-none">
            <a href="">
                <div class="prod_card"
                    style="background: linear-gradient(64deg, #C15233 0%, rgba(193, 82, 51, 0.96) 17%, rgba(193, 82, 51, 0) 58%), url(./images/prod_2.jpg)">
                    <div class="col-xxl-6 col-lg-9">
                        <h3 class="text-white">Smart Cover Solutions</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
            <br class="d-lg-none d-md-block">
            <a href="">
                <div class="prod_card"
                    style="background: linear-gradient(64deg, #C15233 0%, rgba(193, 82, 51, 0.96) 17%, rgba(193, 82, 51, 0) 58%), url(./images/prod_1.jpg)">
                    <div class="col-xxl-6 col-lg-9">
                        <h3 class="text-white">Growth Regulators</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-down">
            <br>
            <a href="">
                <div class="prod_card"
                    style="background: linear-gradient(64deg, #C15233 0%, rgba(193, 82, 51, 0.96) 17%, rgba(193, 82, 51, 0) 58%), url(./images/prod_4.jpg)">
                    <div class="col-xxl-6 col-lg-9">
                        <h3 class="text-white">Growing Medias and Export Sector</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <br>
    <div class="text-end">
        <a href="#" class="text_link">View All &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
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
                <div class="slider-card">
                    <div class="serv_img mb-2">
                        <img src="images/serv_1.jpg" alt="">
                    </div>
                    <!-- <div class="serv_img mb-2">
                  <div class="owl-carousel serv_img_caro">
                    <div class="slider-card">
                      <img src="images/serv_1.jpg" alt="">
                    </div>
                    <div class="slider-card">
                      <img src="images/serv_6.jpg" alt="">
                    </div>
                  </div>
                </div> -->
                    <div class="serv_detail_card text-center">
                        <a class="" href="#">
                            <h5>Farmer Training and Extension</h5>
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. </p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="slider-card">
                    <div class="serv_img mb-2">
                        <img src="images/serv_2.jpg" alt="">
                    </div>
                    <div class="serv_detail_card text-center">
                        <a class="" href="#">
                            <h5>Field Demonstrations</h5>
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. </p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="slider-card">
                    <div class="serv_img mb-2">
                        <img src="images/serv_3.jpg" alt="">
                    </div>
                    <div class="serv_detail_card text-center">
                        <a class="" href="#">
                            <h5>Nutrient Advice and Crop Clinics</h5>
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. </p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="slider-card">
                    <div class="serv_img mb-2">
                        <img src="images/serv_4.jpg" alt="">
                    </div>
                    <div class="serv_detail_card text-center">
                        <a class="" href="#">
                            <h5>Innovative Agri Technology</h5>
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. </p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="slider-card">
                    <div class="serv_img mb-2">
                        <img src="images/serv_5.jpg" alt="">
                    </div>
                    <div class="serv_detail_card text-center">
                        <a class="" href="#">
                            <h5>Laboratory Services</h5>
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. </p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end mt-2">
        <a href="#" class="text_link">View All &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
    </div>
</div>
<br>
<br>

<div class="container-fluid light_bg_sec">
    <div class="container">
        <h1 class="text-center">Industry Insights and News</h1>
        <br>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                <div class="card blog_card border-0 rounded-0">
                    <img src="images/news_1.jpg" class="card-img-top rounded-0" alt="...">
                    <div class="card-body bg-white">
                        <h5 class="card-title">Lorem ipsum heading</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been...</p>
                        <a href="#" class="text_link">Read More &nbsp;<i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-down">
                <div class="card blog_card border-0 rounded-0">
                    <img src="images/news_3.jpg" class="card-img-top rounded-0" alt="...">
                    <div class="card-body bg-white">
                        <h5 class="card-title">Lorem ipsum heading</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been...</p>
                        <a href="#" class="text_link">Read More &nbsp;<i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                <div class="card blog_card border-0 rounded-0">
                    <img src="images/news_4.jpg" class="card-img-top rounded-0" alt="...">
                    <div class="card-body bg-white">
                        <h5 class="card-title">Lorem ipsum heading</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been...</p>
                        <a href="#" class="text_link">Read More &nbsp;<i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-down">
                <div class="card blog_card border-0 rounded-0">
                    <img src="images/news_2.jpg" class="card-img-top rounded-0" alt="...">
                    <div class="card-body bg-white">
                        <h5 class="card-title">Lorem ipsum heading</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been...</p>
                        <a href="#" class="text_link">Read More &nbsp;<i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <br class="d-md-block d-none">
        <div class="text-end">
            <a href="#" class="text_link">View All &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
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
                <div class="slider-card client_logos">
                    <div class="text-center">
                        <img class="mx-auto" src="images/logo_1.jpg" alt="">
                    </div>
                </div>
                <div class="slider-card client_logos">
                    <div class="text-center">
                        <img class="m-auto" src="images/logo_2.jpg" alt="">
                    </div>
                </div>
                <div class="slider-card client_logos">
                    <div class="text-center">
                        <img class="m-auto" src="images/logo_3.jpg" alt="">
                    </div>
                </div>
                <div class="slider-card client_logos">
                    <div class="text-center">
                        <img class="m-auto" src="images/logo_4.jpg" alt="">
                    </div>
                </div>
                <div class="slider-card client_logos">
                    <div class="text-center">
                        <img class="m-auto" src="images/logo_5.jpg" alt="">
                    </div>
                </div>
                <div class="slider-card client_logos">
                    <div class="text-center">
                        <img class="m-auto" src="images/logo_6.jpg" alt="">
                    </div>
                </div>
                <div class="slider-card client_logos">
                    <div class="text-center">
                        <img class="m-auto" src="images/logo_7.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid sec_padding"
    style="background-image: url(images/invest_bg.png); background-repeat: no-repeat; background-size: cover;">
    <div class="container" data-aos="fade-down">
        <h1 class="text-center heading_main text-white mb-4">Invest in the Future of Agriculture</h1>
        <div class="col-lg-8 offset-lg-2 text-center">
            <p class="text-white">Join us in cultivating sustainable growth and innovation. We welcome partnerships
                and investments from those who share our vision for a greener, more prosperous agriculture industry.
                Please get in touch using the form below.</p>
        </div>
    </div>
</div>

<div class="container-fluid sec_padding faq_con_sec"
    style="background-image: url(images/dark_bg.jpg); background-repeat: no-repeat; background-size: cover;">
    <div class="container fluid_contain">
        <div class="row faq_con_row">
            <div class="col-lg-6 faq_sec">
                <h1 class="">FAQ’s</h1>
                <br>
                <div data-aos="fade-up">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Lorem ipsum is simply dummy text of the printing industry?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a type specimen book. </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Lorem ipsum is simply dummy text of the printing industry?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a type specimen book. </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Lorem ipsum is simply dummy text of the printing industry?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a type specimen book. </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Lorem ipsum is simply dummy text of the printing industry?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a type specimen book. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 contact_sec">
                <h1 class="text-white">Get in Touch</h1>
                <br>
                <div class="contact_form" data-aos="fade-down">
                    <form action="">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="text" class="form-control  mb-3" placeholder="Enter your name">
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="email" class="form-control  mb-3" placeholder="Enter your email">
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="tel" class="form-control  mb-3" placeholder="Enter your phone number">
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="text" class="form-control  mb-3" placeholder="Type the subject">
                            </div>
                            <div class="col-lg-12 col-12">
                                <textarea placeholder="Type your message here..." class="form-control h-auto mb-3"
                                    id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                            <div class="text-start contact_submit">
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
