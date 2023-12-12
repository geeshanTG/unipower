@section('title', 'Enquiry')
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
                        <a href="{{ route('enquiry-list') }}">
                            <button class="btn cms_top_btn top_btn_height ">View All</button>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-8">
                    <ul id="sparks" class="">
                        <ul id="sparks" class="">
                            <li class="sparks-info" style="border: 1px solid #c5c5c5; padding-right: 0px; padding: 10px; min-width: auto;">
                                <a href="{{ route('enquiry-list') }}">
                                    <h5>{{ __('enquiry.view_all') }}<span class="txt-color-blue" style="text-align: center"><i class=""></i></span></h5>
                                </a>
                            </li>
                        </ul>
                    </ul>
                </div> -->
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
                    <h2>Enquiry</h2>
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
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width:100% ;  border-style: hidden">
                                <tbody style=" border-style: hidden">
                                    <tr style=" border-style: hidden">
                                        <td style="width: 20%;">Name</td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->name }}</td>
                                    </tr>
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">Email</td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->email }}</td>
                                    </tr>
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">Contact No</td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->phone }}</td>
                                    </tr>
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">Subject</td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->subject }}</td>
                                    </tr>
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">Message</td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->message }}</td>
                                    </tr>
                                    <tr style=" border-style: hidden">
                                        <td style=" border-style: hidden">Recorded At</td>
                                        <td style=" border-style: hidden">:&nbsp; {{ $data->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                        </div>
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
                $('#enquiry-form').parsley();
            });
        </script>
    </x-slot>
</x-app-layout>
