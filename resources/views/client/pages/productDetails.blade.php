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

    <!-- Product Section Begin -->
  
    <section class="product-details spad" style="margin-top: -80px;">
        <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <!-- <div class="row"> -->
                <form class="row" action="{{url('/add-cart',$pro->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic"> 
                            <div class="product__details__pic__item">
                                <img class="product__details__pic__item--large"
                                    src="{{ asset('/productsimage/' . $pro->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3>{{$pro->name}}</h3>
                            <div class="product__details__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(0 reviews)</span>
                            </div>
                            <div class="product__details__price">AED {{$pro->price}}</div>
                            <p>{{$pro->description}}</p>
                            <div class="product__details__quantity">
                                <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" name="quantity" min="1" value="1">
                                </div>
                                </div>
                            </div>
                            <button class="primary-btn" type="submit" style="border:none">ADD TO CART</button>
                            <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                            <ul>
                                <li><b>Availability</b> <span>{{$pro->status}}</span></li>
                                <li><b>Shipping</b> <span>{{$pro->shippingdetails}} <samp></samp></span></li>
                                <li><b>Quantity</b> <span>{{$pro->quantity}}</span></li>
                                <li><b>Share on</b>
                                    <div class="share">
                                        <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.x.com"><i class="fa fa-twitter"></i></a>
                                        <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                        aria-selected="true">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <p>{{$pro->details}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <!-- </div> -->
        </div>
    </section>
  

    <!-- Related Product Section Begin -->
    @if($relatedProducts->count() > 0)
        <section class="related-product" style="margin-top: -80px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title related__product__title">
                            <h2>Related Product</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                 @foreach($relatedProducts as $relatedProduct)    
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('productsimage/' . $relatedProduct->image) }}">
                                <ul class="product__item__pic__hover">
                                    <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                    <li><a href="{{ url('details', $pro->id) }}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{ url('cart', $pro->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{'/shop'}}">{{ $relatedProduct->name }}</a></h6>
                                <h5>AED {{ $relatedProduct->price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    @include('client.sections.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('client.lib.js')


</body>

</html>




