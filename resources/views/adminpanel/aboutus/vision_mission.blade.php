@section('title', 'Vision & Mission')
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
                    <h2>{{ __('Vision & Mission') }}</h2>
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
                        <form action="{{ route('save-vision-mission') }}" enctype="multipart/form-data" method="post" id="vision-mission-form" class="smart-form">
                        @csrf
                        @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-md-12">
                                        <label class="label">{{ __('Vision Heading') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="vision_heading" name="vision_heading" required value="{{ $data->vision_heading }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-11"  style="width: 100%;">
                                        <label class="label">{{ __('Vision Description') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <textarea class="form-control summernote" id="vision_description" name="vision_description" rows="3" required>{{ $data->vision_description }}</textarea>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-12">
                                        <label class="label">{{ __('Mission Heading') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="mission_heading" name="mission_heading" required value="{{ $data->mission_heading }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-11"  style="width: 100%;">
                                        <label class="label">{{ __('Mission Description') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <textarea class="form-control summernote" id="mission_description" name="mission_description" rows="3" required>{{ $data->mission_description }}</textarea>
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
            $(function(){
                $('#vision-mission-form').parsley();
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

    </x-slot>
</x-app-layout>
