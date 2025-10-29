<!DOCTYPE html>
<html lang="zxx">

    @include('client.lib.head')

<body>
    <!-- Page Preloder -->

    <!-- Humberger Begin -->
    @include('client.sections.humberger')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('client.sections.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @include('client.pages.heroForShop')
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('/staticimages/mosaic.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(session('success'))
        <div id="toast-success" class="toast" data-message="{{ session('success') }}">
            <div class="toast-icon">&#10003;</div> <!-- Checkmark icon -->
            <div class="toast-message">{{ session('success') }}</div>
        </div>
    @endif

    @if(session('error'))
        <div id="toast-error" class="toast" data-message="{{ session('error') }}">
            <div class="toast-icon">&#9888;</div> <!-- Warning icon -->
            <div class="toast-message">{{ session('error') }}</div>
        </div>
    @endif

    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
   
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>+971547517311</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p>*************</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>80:00 am to 8:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>samkevsales@outlook.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>

            <form action="{{ url('/message-store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="name" placeholder="Your name" required>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <input type="subject"  style="text-transform: uppercase;" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea name="message" placeholder="Your message" required></textarea>
                        <button type="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

    <!-- Footer Section Begin -->
    @include('client.sections.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('client.lib.js')






</body>

</html>

