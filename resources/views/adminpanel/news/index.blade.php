@section('title', 'News & Events')
<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <style>
            .note-editable {
                min-height: 300px !important;
            }
            .note-editable ul{
                list-style: disc !important;
                list-style-position: inside !important;
            }

            .note-editable ol {
                list-style: decimal !important;
                list-style-position: inside !important;
            }
        </style>
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
                        <a href="{{ route('news-create') }}">
                            <button class="btn cms_top_btn top_btn_height cms_top_btn_active">{{ __('Add New') }}</button>
                        </a>

                        <a href="{{ route('news-list') }}">
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
                    <h2>{{ __('News & Events') }}</h2>
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
                        <form action="{{ route('new-news') }}" enctype="multipart/form-data" method="post" id="news-form" class="smart-form">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Heading') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading" name="heading" required value="">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Date') }} <span style=" color: red;">*</span></label>
                                        <label class="input"><i class="icon-append fa fa-calendar"></i>
                                            <input type="text" id="news_date" name="news_date" value="" class="datepicker" data-date-format='yyyy-mm-dd' placeholder="YYYY-MM-DD" data-parsley-type="date" required>
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
                                        <label class="label">{{ __('Image 1') }} (1200 x 800) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image_1" name="image_1" style="overflow: hidden;" required>
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload-image-1" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                    <section class="col col-md-2">
                                        <label class="label">{{ __('Image 2') }} (1200 x 800) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image_2" name="image_2" style="overflow: hidden;">
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload-image-2" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                    <section class="col col-md-2">
                                        <label class="label">{{ __('Image 3') }} (1200 x 800) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image_3" name="image_3" style="overflow: hidden;">
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload-image-3" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-2">
                                        <label class="label">{{ __('Image 4') }} (1200 x 800) </label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image_4" name="image_4" style="overflow: hidden;">
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload-image-4" src="{{ asset('public/back/img/whitebg.jpg'); }}" alt="preview image" style="max-height: 250px;">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
        <script>
            $(function(){
                //window.ParsleyValidator.setLocale('ta');
                $('#news-form').parsley();
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
            $(document).ready(function(e) {

                $('#image_1').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-image-1').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

                $('#image_2').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-image-2').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

                $('#image_3').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-image-3').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

                $('#image_4').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-image-4').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

            });
        </script>
    </x-slot>
</x-app-layout>
