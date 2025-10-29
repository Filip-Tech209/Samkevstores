<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            @auth()
                <a href="" class="nav-link">{{$greeting}}, <span style="font-weight: bold; font-size:18px;">{{Auth::user()->lastname}}</span></a>
            @else
                <a href="" class="nav-link">{{$greeting}}, <span style="font-weight: bold; font-size:18px;">Guest</span></a>
            @endauth()
        </li> 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                </button>
                </div>
            </div>
            </form>
        </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                @php
                    $unreadCount = \App\Models\Messages::where('is_read', false)->count();
                @endphp
                <span class="badge badge-danger navbar-badge">{{ $unreadCount }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                <!-- Message Start -->
            @foreach($latest as $late)
                <div class="media">
                    <img src="logos/samkev-logo-sm.jpeg" alt="ss" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                    <h3 class="dropdown-item-title">
                        {{$late->name}}
                        
                        <span class="float-right text-sm text-secondary"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">{{$late->subject}}</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$late->created_at->diffForHumans()}} </p>
                    </div>
                </div>
            @endforeach
                <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('inbox') }}" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
     

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i>
                <span class="badge badge-success navbar-badge" style="height:5px;width:2px position: absolute; top: 15px; right: 8px;" style="color:green">.</span>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Logged in As</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" style="text-transform: uppercase">
                    <i class="fas fa-user mr-2"></i> {{ Auth::user()->lastname }}
                </a>
                <div class="dropdown-divider"></div>

                <a href="{{'/logout'}}" class="dropdown-item">
                    <i class="fas fa-arrow-right mr-2"></i> Logout   
                </a>
                
            </div>
        </li>
    </ul>
</nav>

