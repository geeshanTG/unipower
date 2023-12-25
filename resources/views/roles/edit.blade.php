@section('title', 'Role')


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
                    @can('role-create')
                        <a href="{{ route('roles.create') }}">
                            <button class="btn cms_top_btn top_btn_height ">{{ __('Add New') }}</button>
                        </a>
                        @endcan
                            @can('role-list')
                        <a href="{{ route('roles.index') }}">
                            <button class="btn cms_top_btn top_btn_height ">{{ __('View All') }}</button>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <!-- NEW WIDGET START -->

            <!-- Widget ID (each widget will need unique ID)-->

            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                <!-- widget options:

                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">



                    data-widget-colorbutton="false"

                    data-widget-editbutton="false"

                    data-widget-togglebutton="false"

                    data-widget-deletebutton="false"

                    data-widget-fullscreenbutton="false"

                    data-widget-custombutton="false"

                    data-widget-collapsed="true"

                    data-widget-sortable="false"

                    -->

                <header>

                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>

                    <h2>{{ __('Edit Role') }}</h2>

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

                        <form action="{{ route('update-role') }}" enctype="multipart/form-data" method="post" id="category-form" class="smart-form">
                            @csrf
                            @method('PUT')

                            <fieldset>
                                <section class="col col-6">
                                    <label class="label">{{ __('User Type Name') }}</label>
                                    <label class="input">
                                    <input type="text" id="name" name="name" required value="{{ $role->name }}">
                                    </label>
                                </section>

                                {{-- <section class="col col-6">
                                    <label class="label">Upload</label>
                                    <label class="input">
                                        <input type="file" class="form-control form-input" id="user_manual" name="user_manual" style="overflow: hidden;">
                                    </label>
                                </section> --}}
                            </fieldset>
                            <fieldset>
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width='100%'>
                                            <thead>
                                                <tr>
                                                    <th style="text-align:left;">{{ __('Form Name') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($dynamicMenu as $menu)
                                                @if($menu->is_parent==1)
                                                <tr style="background-color: #2e2236; color: #fee73d;">
                                                    @else
                                                <tr>
                                                    @endif
                                                    <td style="font-weight: 900;">
                                                        {!! $menu->is_parent=='0' ? '&nbsp;&nbsp;&nbsp;&nbsp;' : '' !!}{{ $menu->title }} <input type="hidden" name="formid[]" value="1">
                                                    </td>
                                                </tr>
                                                @if($menu->is_parent==0)
                                                @foreach($permission as $value)
                                                @if($value->dynamic_menu_id==$menu->id)
                                                <tr>
                                                    <td style="padding-left: 40px;">
                                                        <section style="float: left;">
                                                            <label class="toggle">
                                                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                                <i data-swchon-text="ON" data-swchoff-text="OFF" style="margin-right: 10px; margin-top: -4px;"></i>
                                                            </label>
                                                        </section>
                                                        {{ $value->name }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </fieldset>
                            <footer>
                                <input type="hidden" name="id" value="{{ $role->id }}">
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

    </x-slot>
</x-app-layout>
