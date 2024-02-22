@include('userpanel.includes.header')
@include('userpanel.includes.innertopbanner')

<div class="container">
    <div class="row contact_page">
        <div class="col-lg-4 col-md-5 contact_info_sec">
            <h1>{{ $contactInfo->heading_title }}</h1>
            <br>
             
            <div class="row align-items-center">
                <div class="col-lg-2 col-2">
                    <img src="{{ asset('public/frontend/images/placeholder.png') }}" class="w-100 m-auto" alt="">
                </div>
                <div class="col-lg-10 col-10">
                    <h5 class="mb-0">Address</h5>
                    <p class="mb-0">{{ $contactInfo->address }}</p>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-lg-2 col-2">
                    <img src="{{ asset('public/frontend/images/phone.png') }}" class="w-100 m-auto" alt="">
                </div>
                <div class="col-lg-10 col-10">
                    <h5 class="mb-0">Phone</h5>
                       <p class="mb-1"><a href="tel:{{ $contactInfo->phone_number_1 }}"
                        style="color: #616161;">{{ $contactInfo->phone_number_1 }}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                        href="tel:{{ $contactInfo->phone_number_2 }}"
                        style="color: #616161;">{{ $contactInfo->phone_number_2 }}</a></p>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-lg-2 col-2">
                    <img src="{{ asset('public/frontend/images/email.png') }}" class="w-100 m-auto" alt="">
                </div>
                <div class="col-lg-10 col-10">
                    <h5 class="mb-0">Email</h5>
                     <a href="mailto:{{ $contactInfo->email }}">
                        <p class="mb-1">{{ $contactInfo->email }}</p>
                    </a>
                </div>
            </div>
            <br>
        </div>
        <div class="col-lg-8 col-md-7 mt-md-0 mt-3" id="contact-us-enquiry">
            <h1>Get in Touch</h1>
            @if (Session::has('success'))
                <div id="success-message" class="alert alert-success text-center">
                    {{ Session::get('success') }}
                </div>
            @endif
            <br>
            <div class="contact_form" data-aos="fade-down">
                <form id="inquiry_form" name="inquiry_form" action="{{ route('save-enquiry') }}" method="post"
                    class="inquiry_form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" class="form-control mb-3 @error('name') is-invalid @enderror"
                                name="name" id="name" placeholder="Enter your name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="email" class="form-control  mb-3 @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="Enter your email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="tel" class="form-control  mb-3 @error('phone') is-invalid @enderror"
                                name="phone" id="phone" placeholder="Enter your phone number">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" class="form-control  mb-3 @error('subject') is-invalid @enderror"
                                name="subject" id="subject" placeholder="Type the subject">
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-12">
                            <textarea placeholder="Type your message here..." name="message" id="message"
                                class="form-control h-auto mb-3 @error('message') is-invalid @enderror" id="exampleFormControlTextarea1"
                                rows="6"></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-start contact_submit">
                            <input type="hidden" name="segment" value="contact-us">
                            <button type="submit" class="btn btn_main rounded-0">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>

@include('userpanel.includes.footer')
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>
