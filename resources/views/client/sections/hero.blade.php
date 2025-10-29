<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all" style="cursor: pointer;">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    <!-- Initially hidden -->
                    <ul style="" class="fold">
                        <li><a href="{{ '/shop' }}">B & C Materials</a></li>
                        <li><a href="{{ '/shop' }}">Pool Products</a></li>
                        <li><a href="{{ '/shop' }}">Tools & Equipments</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{ url('/searchresults') }}" method="GET">
                            <input type="text" name="q"  value="{{ request('q') }}" type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <a href="tel:+971547517311" style="text-decoration: none; color: inherit;">
                                <i class="fa fa-phone"></i> 
                            </a>
                        </div>

                        <div class="hero__search__phone__text">
                            <h5>Call Now</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div style="height:250px" class="hero__item set-bg" data-setbg="{{ asset('/staticimages/mosaic.webp') }}">
                    <div class="hero__text">
                        <span></span>
                        @auth
                            <h2 style="font-weight: bold; font-size:30px;">{{$greeting}}, <span style="font-weight: bold; font-size:28px;">{{Auth::user()->lastname}}</span><br />Welcome to Our Stores</h2>
                        @else
                            <h2 style="font-weight: bold; font-size:30px;">{{$greeting}}, <span style="font-weight: bold; font-size:28px;">Guest</span><br />Welcome to Our Stores</h2>
                        @endauth
                            <p>Shop High Quality Products</p>
                        <a href="{{'/shop'}}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>