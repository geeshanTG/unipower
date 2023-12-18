@section('title', 'Our Core Products')
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
                    <h2>{{ __('Our Core Products') }}</h2>
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
                        <form action="{{ route('save-our-core-products') }}" enctype="multipart/form-data" method="post" id="top-stories-form" class="smart-form">
                        @csrf
                        @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">{{ __('Core Product 1') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="main_category_id_1" id="main_category_id_1" required>
                                                @foreach ($mainCategories as $mainCategory)
                                                <option value="{{ $mainCategory->id }}" {{$data->main_category_id_1 == $mainCategory->id ? 'selected' : ''}}>{{ $mainCategory->heading }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label">{{ __('Core Product 2') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="main_category_id_2" id="main_category_id_2" required>
                                                @foreach ($mainCategories as $mainCategory)
                                                <option value="{{ $mainCategory->id }}" {{$data->main_category_id_2 == $mainCategory->id ? 'selected' : ''}}>{{ $mainCategory->heading }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">{{ __('Core Product 3') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="main_category_id_3" id="main_category_id_3" required>
                                                @foreach ($mainCategories as $mainCategory)
                                                <option value="{{ $mainCategory->id }}" {{$data->main_category_id_3 == $mainCategory->id ? 'selected' : ''}}>{{ $mainCategory->heading }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label">{{ __('Core Product 4') }} <span style=" color: red;">*</span></label>
                                        <label class="select">
                                            <select name="main_category_id_4" id="main_category_id_4" required>
                                                @foreach ($mainCategories as $mainCategory)
                                                <option value="{{ $mainCategory->id }}" {{$data->main_category_id_4 == $mainCategory->id ? 'selected' : ''}}>{{ $mainCategory->heading }}</option>
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
                $('#top-stories-form').parsley();
            });
        </script>

    </x-slot>
</x-app-layout>
