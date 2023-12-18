@section('title', 'Contact Info')
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
                        <form action="{{ route('save-contact-info') }}" enctype="multipart/form-data" method="post" id="contact-info-form" class="smart-form">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Heading Title') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading" name="heading" required value="{{ $data->heading_title }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-4">
                                        <label class="label">{{ __('Description') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <textarea class="form-control" id="description" name="description" rows="4" maxlength="300" required>{{ $data->description }}</textarea>
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Address') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="address" name="address" required value="{{ $data->address }}">
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Fax') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="fax" name="fax" required value="{{ $data->fax }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Contact Number 1') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="phone1" name="phone1" required value="{{ $data->phone_number_1 }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Contact Number 2') }}<span  style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="phone2" name="phone2" value="{{ $data->phone_number_2 }}" required>
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Email') }}<span style=" color: red;">*</span>
                                        </label>
                                        <label class="input">
                                            <input type="text" id="email" name="email" value="{{ $data->email }}" required>
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('Facebook URL') }}<span style=" color: red;">*</span>
                                        </label>
                                        <label class="input">
                                            <input type="text" id="facebook_url" name="facebook_url" required value="{{ $data->facebook_url }}">
                                        </label>
                                    </section>
                                    <section class="col col-4">
                                        <label class="label">{{ __('LinkedIn URL') }}<span style=" color: red;">*</span>
                                        </label>
                                        <label class="input">
                                            <input type="text" id="linkedin_url" name="linkedin_url" required value="{{ $data->linkedin_url }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-4">
                                        <label class="label">{{ __('Twitter URL') }}<span style=" color: red;">*</span>
                                        </label>
                                        <label class="input">
                                            <input type="text" id="twitter_url" name="twitter_url" required value="{{ $data->twitter_url }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <label class="label">{{ __('Logo') }} (1697 x 547) <span style=" color: red;">*</span></label>
                                        <label class="input">
                                            <input type="file" class="form-control form-input" id="logo_image" name="logo" style="overflow: hidden;">
                                        </label>
                                    </section>
                                    <section class="col col-md-2">
                                        <img id="preview-image-before-upload" src="@if(!empty($data->logo)) storage/app/{{ $data->logo }} @else {{ asset('public/back/img/whitebg.jpg'); }} @endif" alt="preview image" style="max-height: 250px;">
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
            $(function() {
                $('#contact-info-form').parsley();
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(e) {

                $('#logo_image').change(function() {

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
