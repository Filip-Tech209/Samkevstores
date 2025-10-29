<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{'/'}}" style="height:20px,width:50px" class="brand-link">
        <img src="logos/samkev-logo-sm.jpeg" alt="SK"  class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SAMKEV STORES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">   

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{url('/dashboard')}}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/shop') }}" class="nav-link {{ request()->is('shop') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Shop</p>
                    </a>
                </li>

                <li class="nav-header">PRODUCTS</li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>
                            My Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/view-product') }}" class="nav-link {{ request()->is('show') ? 'active' : '' }}">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{ url('/add-product') }}" class="nav-link {{ request()->is('add') ? 'active' : '' }}">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Add new</p>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <li class="nav-header">ORDERS</li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('orders*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Placed Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/view-order') }}" class="nav-link {{ request()->is('orders/show') ? 'active' : '' }}">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">NOTIFICATIONS</li>
                <li class="nav-item">
                    <a href="{{ url('/inbox') }}" class="nav-link {{ request()->is('notifications') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Inbox
                            <span class="right badge badge-success">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-header">ADMIN</li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('admin*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Accounts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/view-users') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link {{ request()->is('logout') ? 'active' : '' }}">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>