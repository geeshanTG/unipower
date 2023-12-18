@section('title', 'Middle Banner Content')
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
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                <header>
                    <h2>{{ __('Middle Banner Content') }}</h2>
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
                        <form action="{{ route('save-middle-banner-content') }}" enctype="multipart/form-data" method="post" id="middle-banner-content-form" class="smart-form">
                        @csrf
                        @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Count 1') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="count_1" name="count_1" required value="{{ $data->count_1 }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Heading 1') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading_1" name="heading_1" required value="{{ $data->heading_1 }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Count 2') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="count_2" name="count_2" required value="{{ $data->count_2 }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Heading 2') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading_2" name="heading_2" required value="{{ $data->heading_2 }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Count 3') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="count_3" name="count_3" required value="{{ $data->count_3 }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Heading 3') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading_3" name="heading_3" required value="{{ $data->heading_3 }}">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Count 4') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="count_4" name="count_4" required value="{{ $data->count_4 }}">
                                        </label>
                                    </section>
                                    <section class="col col-md-6">
                                        <label class="label">{{ __('Heading 4') }}<span style=" color: red;">*</span> </label>
                                        <label class="input">
                                            <input type="text" id="heading_4" name="heading_4" required value="{{ $data->heading_4 }}">
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
                $('#middle-banner-content-form').parsley();
            });

        </script>

    </x-slot>
</x-app-layout>
