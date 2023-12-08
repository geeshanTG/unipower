@section('title', 'Dashboard')

<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div id="main" role="main">
        <!-- RIBBON -->
        <div id="ribbon">
        </div>
        <!-- END RIBBON -->
        <div id="content">
        <?php $hour = date('H', time());
            $gritting = "";
        if ($hour > 4 && $hour <= 11) {
            $gritting = "Good Morning";
        } else if ($hour > 11 && $hour <= 16) {
            $gritting = "Good Afternoon";
        } else if ($hour > 16 && $hour <= 23) {
            $gritting = "Good Evening";
        } else {

        }
        ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                    <h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i>  {{ __('Dashboard') }} <br><span></h1>
                </div>


            </div>
            <div class="alert alert-info alert-block">

               <h4 style="text-align: center;" class="alert-heading"><?php echo $gritting . " , " . auth()->user()->name; ?></h4>
       </div>

        </div>
    </div>
    <x-slot name="script">

        <!-- Morris Chart Dependencies -->
        {{-- <script src="{{ asset('public/js/plugin/morris/raphael.min.js') }}"></script>
        <script src="{{ asset('public/js/plugin/morris/morris.min.js') }}"></script>
        <script src="{{ asset('public/js/plugin/chartjs/chart.min.js') }}"></script> --}}
        <script src="https://lcms.tekgeeks.net/public/js/plugin/morris/raphael.min.js"></script>
        <script src="https://lcms.tekgeeks.net/public/js/plugin/morris/morris.min.js"></script>
        <script src="https://lcms.tekgeeks.net/public/js/plugin/chartjs/chart.min.js"></script>


    </x-slot>
</x-app-layout>
