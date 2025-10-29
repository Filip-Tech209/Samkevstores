<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all" style="cursor: pointer;">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    <!-- Initially hidden -->
                    <ul  class="fold">
                        <li><a href="{{ '/shop' }}">Construction</a></li>
                        <li><a href="{{ '/shop' }}">Pool Products</a></li>
                        <li><a href="{{ '/shop' }}">Tools & Equipments</a></li>
                    </ul>
                </div>
            </div>
            

            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{ url('/searchresults') }}" method="GET">
                            <input type="text" name="q" value="{{ request('q') }}" type="text" placeholder="What do yo u need?">
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
            </div>
        </div>
    </div>
</section>