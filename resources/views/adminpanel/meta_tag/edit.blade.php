@section('title', 'Meta Tag')
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
                        <a href="{{ route('meta-tag-list') }}">
                            <button class="btn cms_top_btn top_btn_height ">{{ __('View All') }}</button>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-8">
                    <ul id="sparks" class="">
                        <ul id="sparks" class="">
                            <li class="sparks-info" style="border: 1px solid #c5c5c5; padding-right: 0px; padding: 10px; min-width: auto;">
                                <a href="{{ route('meta-tag-list') }}">
                                    <h5>{{ __('meta_tag.view_all') }}<span class="txt-color-blue" style="text-align: center"><i class=""></i></span></h5>
                                </a>
                            </li>
                        </ul>
                    </ul>
                </div> -->
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
                    <h2>{{ __('Meta Tag') }}</h2>
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
                        <form action="{{ route('save-meta-tag') }}" enctype="multipart/form-data" method="post" id="age-contentce-form" class="smart-form">
                        @csrf
                        @method('PUT')
                            <header>                                   
                                {{ $data->page_name }}
                            </header>
                            <fieldset>
                                <div class="row">
                                    <section class="col col-12" style="width: 100%;">
                                        <label class="label">{{ __('Page Title') }} <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="page_title" name="page_title" required value="{{ $data->page_title }}" >
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-12"  style="width: 100%;">
                                        <label class="label">{{ __('Description') }}<span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="description" name="description" value="{{ $data->description }}" >
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-12"  style="width: 100%;">
                                        <label class="label">{{ __('Keywords') }}</label>
                                        <label class="input">
                                            <input type="text" id="keywords" name="keywords" value="{{ $data->keywords }}" >
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-12"  style="width: 100%;">
                                        <label class="label">{{ __('OG Title') }}<span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="text" id="og_title" name="og_title" value="{{ $data->og_title }}" >
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-12"  style="width: 100%;">
                                        <label class="label">{{ __('OG Type') }}</label>
                                        <label class="input">
                                            <input type="text" id="og_type" name="og_type" value="{{ $data->og_type }}" >
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-12"  style="width: 100%;">
                                        <label class="label">{{ __('OG Url') }}</label>
                                        <label class="input">
                                            <input type="text" id="og_url" name="og_url" value="{{ $data->og_url }}" >
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-12" style="width: 100%;">
                                        <label class="label">{{ __('OG Image') }}<span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="og_image" name="og_image" style="overflow: hidden;">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                    <img id="preview-image-before-upload" src="../../storage/app/{{ $data->og_image }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-12"  style="width: 100%;">
                                        <label class="label">{{ __('OG Sitename') }}</label>
                                        <label class="input">
                                            <input type="text" id="og_sitename" name="og_sitename" value="{{ $data->og_sitename }}" >
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-12"  style="width: 100%;">
                                        <label class="label">{{ __('OG Description') }}</label>
                                        <label class="input">
                                            <input type="text" id="og_description" name="og_description" value="{{ $data->og_description }}" >
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-12"  style="width: 100%;">
                                        <label class="label">{{ __('OG Email') }}</label>
                                        <label class="input">
                                            <input type="text" id="og_email" name="og_email" value="{{ $data->og_email }}" >
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
                $('#meta-tag-form').parsley();
            });
        </script>
        <script>
        $(document).ready(function(e) {

            $('#og_image').change(function() {

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
