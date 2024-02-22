@section('title', 'Products')
<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    </x-slot>

    <div id="main" role="main">
        <!-- RIBBON -->
        <div id="ribbon">
        </div>
        <!-- END RIBBON -->
        <div id="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row cms_top_btn_row" style="margin-left:auto;margin-right:auto;">
                        <a href="{{ route('products-create') }}">
                            <button class="btn cms_top_btn top_btn_height cms_top_btn_active">{{ __('Add New') }}</button>
                        </a>

                        <a href="{{ route('products-list') }}">
                            <button class="btn cms_top_btn top_btn_height ">{{ __('View All') }}</button>
                        </a>
                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                <header>
                    <h2>{{ __('Products') }}</h2>
                </header>
                <!-- widget div-->
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- end widget edit box -->
                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <form action="{{ route('new-products') }}" enctype="multipart/form-data" method="post" id="products-form" class="smart-form">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Main Category') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="main_category_id" id="main_category_id" required>
                                                <option value="">Select a main category</option>
                                                @foreach ($mainCategories as $mainCategory)
                                                <option value="{{ $mainCategory->id }}">{{ $mainCategory->heading }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Sub Category') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="sub_category_id" id="sub_category_id" required>
                                                <option value="">Select a sub category</option>
                                                @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->heading }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Heading') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading" name="heading" required value="">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Sub Heading') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="sub_heading" name="sub_heading" required value="">
                                        </label>
                                    </section>
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Order') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="number" id="order" name="order" required value="">
                                        </label>
                                    </section>
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Status') }}</label>
                                        <label class="select">
                                            <select name="status" id="status">
                                                <option value="Y">{{ __('Active') }}</option>
                                                <option value="N">{{ __('Inactive') }}</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2">
                                        <label class="label">{{ __('Image') }} (600 x 600) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image" name="image" style="overflow: hidden;" required>
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                    <section class="col col-md-2">
                                        <label class="label">{{ __('Brochure') }}</label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="brochure" name="brochure" style="overflow: hidden;">
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-11"  style="width: 100%;">
                                        <label class="label">{{ __('Description') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <textarea class="form-control summernote" id="description" name="description" rows="2" required></textarea>
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button id="button1id" name="button1id" type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <button type="button" class="btn btn-default" onclick="window.history.back();">
                                    {{ __('Back') }}
                                </button>
                            </footer>
                        </form>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </div>
    </div>
    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(function(){
                //window.ParsleyValidator.setLocale('ta');
                $('#products-form').parsley();
            });

            $(document).ready(function() {

                $('.summernote').summernote({
                    height: 200,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'para']], // List options
                        // ['para', ['paragraph']],
                        ['height', ['height']],
                        // ['table', ['table']],
                        // ['insert', ['link', 'picture', 'hr']],
                        // ['view', ['fullscreen', 'codeview', 'help']]
                        ['view', ['codeview']]

                    ],
                });
            });
        </script>

        <script type="text/javascript">
            $('#main_category_id').change(function() {

                var mainCategoryId = $(this).val();
                // console.log(provinceID);

                if (mainCategoryId) {
                    var lang = $('#lang').val();
                    $.ajax({
                        type: "GET",
                        url: "{{ url('getSubCategories') }}?main_category_id=" + mainCategoryId,
                        success: function(res) {

                            if (res) {
                                // console.log(res);
                                $("#sub_category_id").empty();
                                $("#sub_category_id").append('<option>Select Sub Category</option>');
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
        </script>

        <script type="text/javascript">
            $(document).ready(function(e) {

                $('#image').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

            });
        </script>
    </x-slot>
</x-app-layout>
