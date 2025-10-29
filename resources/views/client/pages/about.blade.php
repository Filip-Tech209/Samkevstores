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

    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{ asset('/staticimages/mosaic.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>Who Are We ?</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                  <img src="{{ asset('/staticimages/mosaic.webp') }}" alt="">
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        
                        <h3>Mission</h3>
                        <p>To eliminate the problem of sourcing and bringing the product direct to you.</p>
                        
                        <p style="text-align: justify;">At <span style="font-weight:bold">SamKev</span> , we understand the challenges customers face when sourcing high-quality products. 
                        That’s why we’re committed to bridging the gap by bringing the products you need directly to your doorstep.
                        We are focused into simplifying the process of sourcing, ensuring that you no longer have to navigate through multiple vendors, 
                        face unnecessary delays, or worry about product authenticity. We partner with trusted suppliers to deliver premium-quality items
                        efficiently and reliably, saving you time, effort, and cost.Whether you're a business or an individual, our seamless delivery model 
                        guarantees that you’ll get exactly what you need when you need it.We take pride in being your dependable partner,
                        transforming complex supply chains into effortless solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->


    <!-- Footer Section Begin -->
    @include('client.sections.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('client.lib.js')



</body>

</html>