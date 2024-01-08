@include('userpanel.includes.header')
@include('userpanel.includes.innertopbanner')

<!-- Product Filter Section Start  -->
<div class="container">
    <div class="row" data-aos="fade-up">
        <form id="product_form" name="product_form" action="{{ route('products') }}" method="post">
            @csrf
            <div class="offset-lg-2 col-lg-8">
                <div class="row mx-auto product_filter align-items-end">
                    <div class="col-lg-4 col-md-4">
                        <label class="form-label mb-1">Select Main Category</label>
                        <select class="form-select" aria-label="Default select example" id="main_category_id" name="main_category_id">
                            <option disabled selected>All Products</option>
                            @foreach ($mainCategories as $mainCategory)
                            <option value="{{ $mainCategory->id }}" {{$mainCat == $mainCategory->id ? 'selected' : ''}}>{{ $mainCategory->heading }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label class="form-label mb-1">Select Sub Category</label>
                        <select class="form-select" aria-label="Default select example" id="sub_category_id" name="sub_category_id">
                            <option disabled selected>Select</option>
                            @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" {{$subCat == $subCategory->id ? 'selected' : ''}}>{{ $subCategory->heading }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <button type="submit" id="productSearchBtn" class="btn btn_main rounded-0" style="width: 100%;">search</button>
                    </div>
                    <div id="empty_field_error" style="display: none; color: #d33d3d;">Please select a sub category</div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Product Filter Section End  -->
<br>

<div class="container">
    {{-- <p class="fst-italic text-secondary"><small>Showing 12 of 50 products</small></p> --}}

    <div class="row" data-aos="fade-down">
        @foreach ($products as $product)
        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
            <div>
                <div class="product_card text-center position-relative">
                    <div class="pro_img_text">
                        <img src="{{ asset('storage/app').'/'.$product->image }}" class="w-100 m-auto" alt="">
                        <p class="fw-bold text-dark mt-2 mb-0">{{ $product->heading }}</p>
                        
                    </div>
                    <div class="pro_view_btn position-absolute top-50">
                        @php
                            $productName = preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($product->heading ))));
                           
                            // $encryptedId = encrypt($product->id);
                        @endphp
                        <a href="{{ url('product-detail').'/'.$productName}}" class="btn_main">view details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Start -->
    <br class="d-lg-block d-none">
    <br>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end gap-2 pro_pagination">
            {{ $products->links('userpanel.includes.pagination') }}
            {{-- <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item disabled"><a class="page-link" href="#">01</a></li>
            <li class="page-item"><a class="page-link" href="#">02</a></li>
            <li class="page-item"><a class="page-link" href="#">03</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li> --}}
        </ul>
    </nav>
    <!-- Pagination End -->

</div>
<br>
<br>

@include('userpanel.includes.footer')

<script type="text/javascript">
    $('#main_category_id').change(function() {

        var mainCategoryId = $(this).val();
        // console.log(provinceID);

        if (mainCategoryId) {
            $.ajax({
                type: "GET",
                url: "{{ url('getSubCategoriesWeb') }}?main_category_id=" + mainCategoryId,
                success: function(res) {

                    if (res) {
                        // console.log(res);
                        $("#sub_category_id").empty();
                        $("#sub_category_id").append('<option disabled selected>Select Sub Category</option>');
                        $.each(res, function(key, value) {

                            // console.log(value);

                            $("#sub_category_id").append('<option value="' + value['id'] + '">' + value['heading'] + '</option>');
                        });

                    } else {

                        $("#sub_category_id").empty();
                    }
                }
            });
        } else {

            $("#sub_category_id").empty();
        }
    });

    // $('#productSearchBtn').click(function() {

    //     var mainCategoryId = $('#main_category_id').val();
    //     var subCategoryId = $('#sub_category_id').val();

    //     if(subCategoryId != null) {
    //         $('#empty_field_error').hide();
    //         $.ajax({
    //             type: "GET",
    //             url: "{{ url('getFilteredProducts') }}",
    //             data: {
    //                 main_category_id: mainCategoryId,
    //                 sub_category_id: subCategoryId
    //             },
    //             success: function(res) {


    //                 if (res) {

    //                     // console.log(res);

    //                     // $("#sub_category_id").empty();
    //                     $("#sub_category_id").append('<option disabled selected>Select Sub Category</option>');
    //                     $.each(res, function(key, value) {

    //                         // console.log(value);

    //                         $("#sub_category_id").append('<option value="' + value['id'] + '">' + value['heading'] + '</option>');
    //                     });

    //                 } else {


    //                     $("#sub_category_id").empty();
    //                 }
    //             }
    //         });
    //     } else {
    //         $('#empty_field_error').show();
    //     }


    // });
</script>
