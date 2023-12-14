@section('title', 'Awards')
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
                    <h2>{{ __('Awards') }}</h2>
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
                        <form action="{{ route('save-awards') }}" enctype="multipart/form-data" method="post" id="awards-form" class="smart-form">
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

                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Description (Max character count limit is 400)') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <textarea class="form-control" id="description" name="description" rows="2" maxlength="400" required>{{ $data->description }}</textarea>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-3">
                                        <label class="label">{{ __('Image') }} (550 x 370) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="image" name="image" style="overflow: hidden;">
                                        </label>
                                    </section>
                                    <section class="col col-md-3">
                                        <img id="preview-image-before-upload-image" src="storage/app/{{ $data->image }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                </div>
                                <br>
                                <div class="row">
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Award Title 1') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="award_name_1" name="award_name_1" required value="{{ $data->award_name_1 }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-3">
                                        <label class="label">{{ __('Award Image 1') }} (1080 x 1080) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="award_image_1" name="award_image_1" style="overflow: hidden;">
                                        </label>
                                    </section>
                                    <section class="col col-md-3">
                                        <img id="preview-image-before-upload-award-1" src="storage/app/{{ $data->award_image_1 }}" alt="preview image" style="max-height: 250px;">
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Award Title 2') }} </label>
                                        <label class="input">
                                            <input type="text" id="award_name_2" name="award_name_2" value="{{ $data->award_name_2 }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-3">
                                        <label class="label">{{ __('Award Image 2') }} (1080 x 1080)</label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="award_image_2" name="award_image_2" style="overflow: hidden;">
                                        </label>
                                    </section>
                                    <section class="col col-md-3">
                                        <img id="preview-image-before-upload-award-2" src="@if(!empty($data->award_image_2)) storage/app/{{ $data->award_image_2 }} @else {{ asset('public/back/img/whitebg.jpg'); }} @endif" alt="preview image" style="max-height: 250px;">
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
                $('#awards-form').parsley();
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(e) {

                $('#image').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-image').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

                $('#award_image_1').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-award-1').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

                $('#award_image_2').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload-award-2').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });
            });

        </script>

    </x-slot>
</x-app-layout>
