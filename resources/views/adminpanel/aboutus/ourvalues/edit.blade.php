@section('title', 'Edit Our Values')
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
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                <header>
                    <h2>{{ __('Our Values') }}</h2>
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
                        <form action="{{ route('save-our-values') }}" enctype="multipart/form-data" method="post" id="our-values-form" class="smart-form">
                        @csrf
                        @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Heading') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading" name="heading" required value="{{ $data->heading }}">
                                        </label>
                                    </section>

                                    <section class="col col-md-3">
                                        <label class="label">{{ __('Icon') }} (50 x 50) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="icon" name="icon" style="overflow: hidden;">
                                        </label>
                                    </section>
                                    <section class="col col-md-3">
                                        <img id="preview-image-before-upload" src="storage/app/{{ $data->icon }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Order') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="number" id="order" name="order" required value="{{ $data->order }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-11"  style="width: 100%;">
                                        <label class="label">{{ __('Description (Max word count limit is 200)') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <textarea class="form-control summernote" id="description" name="description" rows="2" required>{{ $data->description }}</textarea>
                                        </label>
                                        <div id="word-count" style="color:#F00; margin-top: -3px"></div>
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
            $(function(){
                $('#our-values-form').parsley();
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
                    callbacks: {
                        onKeydown: function (e) {
                            var words = e.currentTarget.innerText.trim().split(/\s+/).length;

                            // Adjust the word limit as needed
                            var maxWords = 200;

                            if (words >= maxWords) {
                                // Prevent further typing
                                e.preventDefault();
                            }
                        },
                        onChange: function (contents, $editable) {
                            // Optional: Update word count display
                            var words = contents.trim().split(/\s+/).length;

                            var wordCountWarning = 'Word Count ' + words;

                            $('#word-count').text(wordCountWarning);

                            // Adjust the word limit as needed
                            var maxWords = 200;

                            if (words > maxWords) {
                                // Trim excess words
                                var delta = words - maxWords;
                                var text = $editable.text().trim().split(/\s+/);
                                text.splice(-delta);
                                $editable.html(text.join(' '));

                                var wordCountWarning = 'Maximum Word count length is 200.';

                                // Optional: Update word count display after trimming
                                $('#word-count').text(wordCountWarning);
                            }
                        }
                    }
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(e) {

                $('#icon').change(function() {

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
