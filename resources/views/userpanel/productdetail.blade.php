 @include('userpanel.includes.header')
 @include('userpanel.includes.innertopbanner')

  <!-- Product detail box section start  -->

  <div class="container">
    <div class="row mx-auto pro_detail">
      <div class="col-lg-3 col-md-4 col-12">
        <div class="border">
          <img src="{{ asset('storage/app').'/'.$products->image }}" alt="" class="w-100 m-auto">
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-12 mt-md-0 mt-4">
        <h4>{{ $products->heading }}</h4>
        <h5 style="color: #00732E;">{{ $products->sub_heading }}</h5>
        <p>{!! $products->description !!}</p>
        @if(!empty($products->brochure))<a href="{{ asset('storage/app/').'/'.$products->brochure }}" class="text_link">Download Brochure &nbsp;<i class="fa fa-download" aria-hidden="true"></i></a>@endif
      </div>
    </div>
  </div>

  <br>
  <br>

  <!-- Product detail box section end  -->

  <!-- Related products section start  -->

  @if(!$productList->isEmpty())
  <div class="container">
    <h1 class="text-center">Related Products</h1>
    <br>
    <div class="slider">
      <div class="owl-carousel related_caro">
        @foreach($productList as $product)
        <div class="slider-card">
          <div>
            <div class="product_card text-center position-relative">
              <div class="pro_img_text">
                <img src="{{ asset('storage/app').'/'.$product->image }}" class="w-100 m-auto" alt="">
                <p class="fw-bold text-dark mt-2 mb-0">{{ $product->heading }}</p>
              </div>
              <div class="pro_view_btn position-absolute top-50">
                @php
                $productName = preg_replace('/\s+/', '-', $product->heading);
                $proName = strtolower($productName);
                $encryptedId = encrypt($product->id);
                @endphp
                <a href="{{ url('product-detail').'/'.$proName.'/'.$encryptedId }}" class="btn_main">view details</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @endif
  <br>
  <br>

  <!-- Related products section end  -->

  @include('userpanel.includes.footer')
