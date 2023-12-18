@section('title', 'Edit Products')
<x-app-layout>
    <x-slot name="header">
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
                    <h2>{{ __('Edit Products') }}</h2>
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
                        <form action="{{ route('save-products') }}" enctype="multipart/form-data" method="post" id="products-form" class="smart-form">
                        @csrf
                        @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Main Category') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="main_category_id" id="main_category_id" required>
                                                <option value="">Select a main category</option>
                                                @foreach ($mainCategories as $mainCategory)
                                                <option value="{{ $mainCategory->id }}" {{$data->main_category_id == $mainCategory->id ? 'selected' : ''}}>{{ $mainCategory->heading }}</option>
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
                                                <option value="{{ $subCategory->id }}" {{$data->sub_category_id == $subCategory->id ? 'selected' : ''}}>{{ $subCategory->heading }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Heading') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading" name="heading" required value="{{ $data->heading }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Order') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="order" name="order" required value="{{ $data->order }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Status') }}</label>
                                        <label class="select">
                                            <select name="status" id="status">
                                                <option value="Y" {{ $data->status == 'Y' ? "selected" : "" }}>{{ __('Active') }}</option>
                                                <option value="N" {{ $data->status == 'N' ? "selected" : ""  }}>{{ __('Inactive') }}</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <input type="hidden" name="id" value="{{ $data->id }}>">
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

        <script>
            $(function(){
                $('#sub-categories-form').parsley();
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

    </x-slot>
</x-app-layout>
