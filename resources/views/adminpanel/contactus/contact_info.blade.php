@section('title', 'Contact Info')
<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <style>
            .note-editable {
                min-height: 300px !important;
            }

            .note-editable ul {
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
                    <br><br>
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
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false"
                data-widget-custombutton="false" role="widget">
                <header>
                    <h2>{{ __('Contact Info') }}</h2>
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
                        <form action="{{ route('save-contact-info') }}" enctype="multipart/form-data" method="post"
                            id="save-contact-info-form" class="smart-form">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-5">
                                        <label class="label">{{ __('Heading Title') }}<span
                                                style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading" name="heading" required
                                                value="{{ $data->heading_title }}">
                                        </label>
                                    </section>
                                    <section class="col col-5">
                                        <label class="label">{{ __('Address') }}<span style=" color: red;">*</span>
                                        </label>
                                        <label class="input">
                                            <input type="text" id="address" name="address" required
                                                value="{{ $data->address }}">
                                        </label>
                                    </section>
                                </div>

                                
                                <div class="row">
                                    <section class="col col-5">
                                        <label class="label">{{ __('Phone Number 1') }}<span
                                                style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="phone1" name="phone1" required
                                                value="{{ $data->phone_number_1 }}">
                                        </label>
                                    </section>
                                    <section class="col col-5">
                                        <label class="label">{{ __('Phone Number 2') }}<span
                                                style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="phone2" name="phone2"
                                                value="{{ $data->phone_number_2 }}">
                                        </label>
                                    </section>
                                </div>
                               
                                <div class="row">
                                    <section class="col col-5">
                                        <label class="label">{{ __('Email') }}<span style=" color: red;">*</span>
                                        </label>
                                        <label class="input">
                                            <input type="text" id="email" name="email" required
                                                value="{{ $data->email }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-11" style="width: 100%;">
                                        <label class="label">{{ __('Description') }}<span
                                                style=" color: red;">*</span>
                                        </label>
                                        <label class="input">
                                            <textarea class="form-control summernote" id="description" name="description" rows="3" required>{{ $data->description }}</textarea>
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
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        <script>
            $(function() {
                $('#who-we-are-form').parsley();
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

                    ]
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
            });

            $(document).ready(function(e) {

                $('#image_2').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-image-2').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });
            });

            $(document).ready(function(e) {

                $('#image_3').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-image-3').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });
            });
        </script>

    </x-slot>
</x-app-layout>
