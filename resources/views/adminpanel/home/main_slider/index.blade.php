@section('title', 'Main Slider')
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
                        <a href="{{ route('main-slider-create') }}">
                            <button class="btn cms_top_btn top_btn_height cms_top_btn_active">{{ __('Add New') }}</button>
                        </a>

                        <a href="{{ route('main-slider-list') }}">
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
                    <h2>{{ __('Main Slider') }}</h2>
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
                        <form action="{{ route('new-main-slider') }}" enctype="multipart/form-data" method="post" id="main-slider-form" class="smart-form">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Heading') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading" name="heading" required value="">
                                        </label>
                                    </section>
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
                                </div>
                                <div class="row">
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
                                <br>
                                <div class="row">
                                    <section class="col col-md-2">
                                        <label class="label">{{ __('Icon') }} (512 x 512) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="icon" name="icon" style="overflow: hidden;" required>
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload-icon" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px; background-color: #000000;">
                                    </section>
                                    <section class="col col-md-2">
                                        <label class="label">{{ __('Desktop Image') }} (1920 x 1080) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="desktop_image" name="desktop_image" style="overflow: hidden;" required>
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload-image-desktop" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                    <section class="col col-md-2">
                                        <label class="label">{{ __('Mobile Image') }} (1080 x 1920) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="mobile_image" name="mobile_image" style="overflow: hidden;" required>
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload-image-mobile" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
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
        <script>
            $(function(){
                //window.ParsleyValidator.setLocale('ta');
                $('#main-slider-form').parsley();
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(e) {

                $('#icon').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-icon').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

                $('#desktop_image').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-image-desktop').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

                $('#mobile_image').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-image-mobile').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

            });
        </script>
    </x-slot>
</x-app-layout>
