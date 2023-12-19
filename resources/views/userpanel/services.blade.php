@include('userpanel.includes.header')
@include('userpanel.includes.innertopbanner')

<div class="container">
    <div class="row align-items-center" data-aos="fade-up">
        <div class="col-lg-12">
            <p>{!! $pageContent->description !!}</p>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row services_archive" data-aos="fade-down">
        <h1 class="mb-3">All Services</h1>
        @foreach ($services as $service)
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div>
                    <div class="serv_img mb-2">
                        <img src="{{ asset("/storage/app/").'/'.$service->image_1 }}" alt="" class="m-auto w-100">
                    </div>
                    <div class="serv_detail_card text-center">
                        <a class=""
                            href="{{ route('service', ['name' =>preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($service->heading)))), 'id' => encrypt($service->id)]) }}">
                            <h5>{{ $service->heading }}</h5>
                            <p class="mb-0">{{ $service->short_description }}</p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                </div>
                           </div>

                        </a>
                    </div>
                </div>
                <br>
            </div>
        @endforeach
        {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="mb-3">
          <div class="serv_img mb-2">
            <img src="images/serv_2.jpg" alt="" class="m-auto w-100">
          </div>
          <div class="serv_detail_card text-center">
            <a class="" href="#">
              <h5>Field Demonstrations</h5>
              <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              <div class="go-corner" href="#">
                <div class="go-arrow">
                  →
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="mb-3">
          <div class="serv_img mb-2">
            <img src="images/serv_3.jpg" alt="" class="m-auto w-100">
          </div>
          <div class="serv_detail_card text-center">
            <a class="" href="#">
              <h5>Nutrient Advice and Crop Clinics</h5>
              <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              <div class="go-corner" href="#">
                <div class="go-arrow">
                  →
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="mb-3">
          <div class="serv_img mb-2">
            <img src="images/serv_4.jpg" alt="" class="m-auto w-100">
          </div>
          <div class="serv_detail_card text-center">
            <a class="" href="#">
              <h5>Innovative Agri Technology</h5>
              <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              <div class="go-corner" href="#">
                <div class="go-arrow">
                  →
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="mb-3">
          <div class="serv_img mb-2">
            <img src="images/serv_5.jpg" alt="" class="m-auto w-100">
          </div>
          <div class="serv_detail_card text-center">
            <a class="" href="#">
              <h5>Laboratory Services</h5>
              <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              <div class="go-corner" href="#">
                <div class="go-arrow">
                  →
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="mb-3">
          <div class="serv_img mb-2">
            <img src="images/serv_6.jpg" alt="" class="m-auto w-100">
          </div>
          <div class="serv_detail_card text-center">
            <a class="" href="#">
              <h5>Landscaping Solutions</h5>
              <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              <div class="go-corner" href="#">
                <div class="go-arrow">
                  →
                </div>
              </div>
            </a>
          </div>
        </div>
      </div> --}}
    </div>
</div>


@include('userpanel.includes.footer')
