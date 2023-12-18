@section('title', 'Industry Insights and News')
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
                    <h2>{{ __('Industry Insights and News') }}</h2>
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
                        <form action="{{ route('save-industry-insights') }}" enctype="multipart/form-data" method="post" id="industry-insights-form" class="smart-form">
                        @csrf
                        @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">{{ __('News 1') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="news_id_1" id="news_id_1" required>
                                                @foreach ($news as $new)
                                                <option value="{{ $new->id }}" {{$data->news_id_1 == $new->id ? 'selected' : ''}}>{{ $new->heading }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label">{{ __('News 2') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="news_id_2" id="news_id_2" required>
                                                @foreach ($news as $new)
                                                <option value="{{ $new->id }}" {{$data->news_id_2 == $new->id ? 'selected' : ''}}>{{ $new->heading }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">{{ __('Service 3') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="news_id_3" id="news_id_3" required>
                                                @foreach ($news as $new)
                                                <option value="{{ $new->id }}" {{$data->news_id_3 == $new->id ? 'selected' : ''}}>{{ $new->heading }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label">{{ __('Service 4') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="news_id_4" id="news_id_4" required>
                                                @foreach ($news as $new)
                                                <option value="{{ $new->id }}" {{$data->news_id_4 == $new->id ? 'selected' : ''}}>{{ $new->heading }}</option>
                                                @endforeach
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
                $('#industry-insights-form').parsley();
            });
        </script>

    </x-slot>
</x-app-layout>
