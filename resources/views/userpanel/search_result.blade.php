@include('userpanel.includes.header')
@include('userpanel.includes.innertopbanner')

<div class="container" data-aos="fade-up">
    <!-- Search Result  -->
    @if (count($data) > 0)
        @foreach ($data as $service)
            <div class="search_result">
                <a
                    href="{{ route('service', ['name' => preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($service->heading)))), 'id' => encrypt($service->id)]) }}">
                    <h3>{{ $service->heading }}</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </a>
                <hr>
            </div>
        @endforeach
    @else
        <div class="search_result">
            <h3>No any result found</h3>
        </div>
    @endif

    {{-- <!-- Pagination Start --> --}}
    <br class="d-lg-block d-none">
    <br>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end gap-2 pro_pagination">
            {{ $data->links('userpanel.includes.pagination') }}
        </ul>
    </nav>
    </ul>
    <!-- Pagination End -->
</div>

<br>
<br>
<br>

@include('userpanel.includes.footer')
