<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{'/'}}"><img style="height:100px" src="logos/samkev-logo-sm.jpeg" alt="logo"> </a>
    </div>
    <div class="humberger__menu__cart">
    <ul>
        <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
            @if(Auth::check())
            <li><a href="{{(url('/cart',Auth::user()->id))}}"><i class="fa fa-shopping-bag"></i> <span>{{$count}}</span></a></li>
        @else
            <li><a href="{{('/cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{$count}}</span></a></li>
        @endif
    </ul>
        <div class="header__cart__price">Items in the cart</div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="staticimages/language.png" alt="">
            <div style="color: black;">English</div>
            <span style="color: black;" class="arrow_carrot-down"></span>
            <ul>
                <!-- <li><a href="#">Spanis</a></li> -->
                <li><a href="#" style="color: black;">English</a></li>

            </ul>
        </div>
        <div class="header__top__right__auth" >
            @if(Auth::check())
                <!-- Dropdown for logged-in users -->
                <div class="dropdown">
                    <a class="dropdown-toggle" style="color:black" href="" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                        <i class="fa fa-user"></i>{{ Auth::user()->lastname }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    @if(Auth::user()->usertype == 1)
                        <li>
                            <a class="dropdown-item"style="color:black" href="{{ url('/profile') }}">
                                <i class="fa fa-user-circle"></i> Admin Dashboard
                            </a>
                        </li>
                    @endif
                        <li>
                            <form action="{{ url('logout') }}" method="GET" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item" style="border: none; color:black; background: none; cursor: pointer;">
                                    <i class="fa fa-sign-out"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Login link for guests -->
                <a href="{{ url('login') }}" style="text-decoration: none;color:black">
                    <i class="fa fa-user"></i> Login
                </a>
            @endif
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{'/'}}">Home</a></li>
            <li><a href="{{'/shop'}}">Shop</a></li>
            <li><a href="{{'/contact'}}">Contact</a></li>
            <li><a href="{{'about-us'}}">About Us</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social" >
        <a style="color:black" href="https://www.facebook.com/share/18CdkWfeM9/"><i class="fa fa-facebook"></i></a>
        <a style="color:black" href="https://www.instagram.com/samkev48"><i class="fa fa-instagram"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li>
                <a href="mailto:samkevsales@outlook.com" style="text-decoration: none; color: inherit;">
                    <i class="fa fa-envelope"></i> samkevsales@outlook.com
                </a>
            </li>
        </ul>
    </div>
</div>