@section('title', 'Login')
<!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Add icon library -->

<x-guest-layout>
    <div id="main" role="main">

        <!-- MAIN CONTENT -->
        <div id="content" class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm" style="padding-top: 6%;">
                    <!--<h1 class="txt-color-red login-header-big">WELCOME</h1>-->
                    <div class="hero" style="background-image: none; margin-top: 25%;">

                        <h1 style="font-weight: 900; color: #3b2c46; font-size: 35px;">{{ __('Content Management System') }}</h1>

                        <h1 style="font-weight: 400; color: #000000;">{{ __('Unipower') }}</h1>

                    </div>


                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 login_form_div">

                    <div class="well no-padding" style="box-shadow: none; background-color: transparent;">


                        <img src="{{ asset('public/css/userpanel/img/kings-login-logo.png') }}" alt="" class="img-responsive labor_logo center-block" style="padding-left: 15px; padding-right: 15px; margin-bottom: 30px;">

                        <!-- <div class="mx-auto logo_col no_padding">
                            <div class="logo_col">
                                <img src="https://cms.tekgeeks.net/public/back/img/logo1.png" alt="" class="logo">
                                <p class="logo_text_e">Department Labour</p>
                                <p class="logo_text_s">කම්කරු දෙපාර්තමේන්තුව</p>
                                <p class="logo_text_t">தொழில் திணைக்களம்</p>
                            </div>
                            <img src="https://cms.tekgeeks.net/public/back/img/l_logo1.png" alt="" class="l_logo">
                        </div> -->

                        <form method="POST" action="{{ route('login') }}" class="smart-form client-form">
                            @csrf
                            <header style="background-color: trnsparent; border:none; padding-bottom: 0px;">
                                <b style="color: #fee73d;"> {{ __('SIGN IN') }}</b>
                            </header>
                            <!-- Email Address -->
                            <fieldset>
                                <section><x-auth-validation-errors class="mb-4" :errors="$errors" /></section>
                                <section>
                                    <x-label class="label" for="email" :value="__('Email')" />
                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                        <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                                    </label>
                                </section>

                                <section>
                                    <x-label class="label" for="password" :value="__('Password')" />
                                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <x-input id="password"  type="password" name="password" required autocomplete="current-password" />
                                    <div class="note">
                                    </div>
                                </section>

                            </fieldset>
                            <footer style="background-color: transparent; border:none;">

                                <x-button class="btn btn-primary save_btn" style="width: 100%;display: block;">
                                    {{ __('Login') }}
                                </x-button>
                            </footer>

                        </form>

                    </div>



                </div>


            </div>
        </div>

    </div>
</x-guest-layout>
