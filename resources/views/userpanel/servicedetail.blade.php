@include('userpanel.includes.header')
@include('userpanel.includes.innertopbanner')


<div class="container" data-aos="fade-up">
    <h1>{{ $service->heading }}</h1>
    <br>
    <p>{!! $service->long_description !!}</p>
    <button type="button" class="btn btn_main rounded-0" onclick="window.location.href='{{ url('contact-us') }}'">Inquire Now</button>
</div>
<br>
<br>

<div class="container" data-aos="fade-down">

    <div class="tz-gallery">

        <div class="row mx-auto">
            @for ($i = 0; $i < count($images); $i++)
                <div class="col-sm-6 col-md-4 col-6 position-relative">
                    <a class="lightbox" href="{{ asset('/storage/app/') . '/' . $images[$i] }}">
                        <img src="{{ asset('/storage/app/') . '/' . $images[$i] }}" alt="Bridge">
                    </a>
                </div>
            @endfor
        </div>
    </div>
</div>
<br>
<br>

@include('userpanel.includes.footer')

