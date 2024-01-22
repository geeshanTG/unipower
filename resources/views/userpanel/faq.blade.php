@include('userpanel.includes.header')
@include('userpanel.includes.innertopbanner')

<div class="container" data-aos="fade-up">
    <div class="row faq_con_row">
        <div class="offset-lg-1 col-lg-10 faq_sec">
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
                            <button class="accordion-button @if($c !=1) {{ 'collapsed' }} @endif" type="button" data-bs-toggle="collapse"
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
                            <p>{{ $faq->description }}</p>
                        </div>
                    </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</div>

<br>
<br>


@include('userpanel.includes.footer')
