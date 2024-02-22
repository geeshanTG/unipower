@include('userpanel.includes.header')
@include('userpanel.includes.innertopbanner')

<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-12 col-sm-12">
                <small class="fst-italic">{{ date('d / m / Y', strtotime($news->news_date)) }}</small>
                <h2 class="mb-4">{{ $news->heading }}</h2>

                <!-- Slider Section  -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 0; $i < count($images); $i++)
                            <div class="carousel-item @if ($i == 0) {{ 'active' }} @endif">
                                <img src="{{ asset('/storage/app/') . '/' . $images[$i] }}" class="d-block w-100"
                                    alt="...">
                            </div>
                        @endfor

                    </div>
              	@if(count($images)>1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                 @endif
                </div>
                <!-- Slider Section  -->
                <br>

                <div data-aos="fade-up">
                    <p>{!! $news->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="container-fluid">
        <div class="container">
            <h2 class="text-center">Other Industry Insights and News</h2>
            <br>
            <div class="row">
                @foreach ($Allnews as $news)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up">

                        <div class="card blog_card border-0 rounded-0">
                            <img src="{{ asset('/storage/app/') . '/' . $news->image_1 }}"
                                class="card-img-top rounded-0" alt="...">
                            <div class="card-body bg-white">
                                  <h5 class="card-title" >{{ Str::limit($news->heading, 35) }}</h5>
                                @php
                                    $description = strip_tags($news->description);
                                    $words = str_word_count($description, 1);
                                    $limitedWords = array_slice($words, 0, 16);
                                    $limitedDescription = implode(' ', $limitedWords);
                                @endphp
                                 <p class="card-text mb-1">{{ Str::limit($limitedDescription, 55) }}...</p>

                                <a href="{{ route('news-detail', ['name' =>preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($news->heading)))), 'id' => encrypt($news->id)]) }}" class="text_link">Read More &nbsp;<i class="fa fa-arrow-right"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
            <br class="d-md-block d-none">
            <div class="text-end">
                <a href="{{ route('news') }}" class="text_link">View All &nbsp;<i class="fa fa-arrow-right"
                        aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>

    <br>
    <br>
    <br>
    @include('userpanel.includes.footer')
