@include('userpanel.includes.header')
@include('userpanel.includes.innertopbanner')

<!-- News section start  -->

<div class="container news_sec">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="row">
                <div>
                    <h1>Top Stories</h1>
                    <br>
                </div>
                @for ($i = 0; $i < count($topStory); $i++)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="card blog_card border-0 rounded-0">
                            <img src="{{ asset('/storage/app/') . '/' . $topStory[$i]->image_1 }}"
                                class="card-img-top rounded-0" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($topStory[$i]->heading, 50) }}</h5>
                                @php
                                    $description = strip_tags($topStory[$i]->description);
                                    $words = str_word_count($description, 1);
                                    $limitedWords = array_slice($words, 0, 16);
                                    $limitedDescription = implode(' ', $limitedWords);
                                @endphp
                                <p class="card-text mb-1">{{ $limitedDescription }}...</p>
                                <a href="{{ route('news-detail', ['name' =>preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($topStory[$i]->heading)))), 'id' => encrypt($topStory[$i]->id)]) }}" class="text_link">Read More &nbsp;<i class="fa fa-arrow-right"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endfor


            </div>
        </div>
        <div class="col-lg-6 col-12">
            <br class="d-lg-none d-block">
            <h1>Featured News</h1>
            <br>
            @for ($i = 0; $i < count($featuredNews); $i++)
                <div class="row align-items-center mb-3">
                    <div class="col-lg-4 col-md-4 col-4">
                        <img src="{{ asset('/storage/app/') . '/' . $featuredNews[$i]->image_1 }}" alt=""
                            class="w-100 m-auto">
                    </div>
                    <div class="col-lg-8 col-md-8 col-8">
                        <h5 class="card-title">{{ Str::limit($featuredNews[$i]->heading, 70) }}</h5>
                        @php
                            $description = strip_tags($featuredNews[$i]->description);
                            $words = str_word_count($description, 1);
                            $limitedWords = array_slice($words, 0, 16);
                            $limitedDescription = implode(' ', $limitedWords);
                        @endphp

                        <p class="card-text mb-1 d-md-block d-none">{{ $limitedDescription }}...</p>
                        <a href="{{ route('news-detail', ['name' =>preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($featuredNews[$i]->heading)))), 'id' => encrypt($featuredNews[$i]->id)]) }}" class="text_link">Read More &nbsp;<i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <hr>
    <br>

    <div class="row">
        @for ($i = 0; $i < count($news); $i++)
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">

                <div class="card blog_card border-0 rounded-0">
                    <img src="{{ asset('/storage/app/') . '/' . $news[$i]->image_1 }}" class="card-img-top rounded-0"
                        alt="{{ $news[$i]->heading }}">
                    <div class="card-body">
                        <h5 class="card-title" >{{ Str::limit($news[$i]->heading, 50) }}</h5>
                        @php
                            $description = strip_tags($news[$i]->description);
                            $words = str_word_count($description, 1);
                            $limitedWords = array_slice($words, 0, 16);
                            $limitedDescription = implode(' ', $limitedWords);
                        @endphp
                        <p class="card-text mb-1">{{ $limitedDescription }}...</p>
                        <a href="{{ route('news-detail', ['name' =>preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($news[$i]->heading)))), 'id' => encrypt($news[$i]->id)]) }}" class="text_link">Read More &nbsp;<i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>

            </div>
        @endfor
    </div>
    <!-- Pagination Start -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end gap-2 pro_pagination">
            {{ $news->links('userpanel.includes.pagination') }}
        </ul>
    </nav>
    <!-- Pagination End -->
</div>

<!-- News section end  -->
<br>
<br>

@include('userpanel.includes.footer')
