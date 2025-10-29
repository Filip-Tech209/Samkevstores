<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                    <ul>
                        <li>
                            <p href="mailto:samkevsales@outlook.com" style="text-decoration: none; color: inherit;">
                                <i class="fa fa-envelope"></i> samkevsales@outlook.com
                            </p>
                        </li>
                        <li> 
                        <!-- https://wa.me/971547517311 -->
                            <p href="#" style="text-decoration: none; color: inherit;" target="_blank"> 
                                <i class="fa fa-phone"></i> +971547517311
                            </p>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="https://www.facebook.com/share/18CdkWfeM9/"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/samkev48"><i class="fa fa-instagram"></i></a>
                        </div>
                        <div class="header__top__right__language">
                        <img src="staticimages/language.png" alt="">
                            <div id="selectedLanguage">English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <!-- <li><a href="?lang=es" onclick="changeLanguage('Spanish')">Spanish</a></li> -->
                                <li><a href="?lang=en" onclick="changeLanguage('English')">English</a></li>
                            </ul>
                        </div>
                        <script>
                            function changeLanguage(language) {
                                document.getElementById('selectedLanguage').textContent = language;
                            }
                        </script>
                        <div class="header__top__right__auth">
                            @if(Auth::check())
                                <!-- Dropdown for logged-in users -->
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                                        <i class="fa fa-user"></i>{{ Auth::user()->lastname }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    @if(Auth::user()->usertype == 1)
                                        <li>
                                            <a class="dropdown-item" style="color:black;" href="{{ url('/dashboard') }}">
                                                <i class="fa fa-user-circle" ></i> Admin Dashboard
                                            </a>
                                        </li>
                                    @endif
                                        <li>
                                            <form action="{{ url('logout') }}" method="GET" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="dropdown-item" style="border: none; background: none; cursor: pointer;">
                                                    <i class="fa fa-sign-out"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <!-- Login link for guests -->
                                <a href="{{ url('login') }}" style="text-decoration: none;">
                                    <i class="fa fa-user"></i> Login
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{'/'}}"> <img style="height:30px; width:auto" src="logos/samkev-logo-lg.png" alt="logo" /> </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="{{ request()->is('shop') ? 'active' : '' }}">
                            <a href="{{ url('/shop') }}">Shop</a>
                        </li>
                        <li class="{{ request()->is('contact') ? 'active' : '' }}">
                            <a href="{{ url('/contact') }}">Contact</a>
                        </li>
                        <li class="{{ request()->is('about-us') ? 'active' : '' }}">
                            <a href="{{ url('/about-us') }}">About Us</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <script>
                .header__menu .active a {
                    color: blue; /* Change to your desired color */
                    font-weight: bold; /* Optional: make the active link bold */
                }
            </script>

            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                         @if(Auth::check())
                            <li><a href="{{(url('/view-cart',Auth::user()->id))}}"><i class="fa fa-shopping-bag"></i> <span>{{$count}}</span></a></li>
                        @else
                            <li><a href="{{('/view-cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{$count}}</span></a></li>
                        @endif
                         <div class="header__cart__price">Items in the cart</div>
                    </ul>
                    <div class="header__cart__price"> <span></span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

<script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownToggle = document.getElementById('userDropdown');
            if (dropdownToggle) {
                dropdownToggle.addEventListener('click', function (event) {
                    event.preventDefault();
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>


</script>