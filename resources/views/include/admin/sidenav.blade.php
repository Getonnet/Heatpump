<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="{{route('main')}}">
                <img src="{{asset('assets/img/brand/logo.svg')}}" class="navbar-brand-img" alt="Logo">
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('main') ? 'active':''}}" href="{{route('main')}}"><i class="ni ni-archive-2 text-green"></i><span class="nav-link-text">Dashboard</span></a>
                    </li>

                    @canany(['product-view', 'cat-view', 'brand-view', 'attr-view'])
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('product.*') ? 'active':''}}" aria-expanded="{{request()->routeIs('product.*') ? 'true':'false'}}" href="#product-nav" data-toggle="collapse" role="button" aria-controls="product-nav">
                            <i class="ni ni-bag-17 text-danger"></i>
                            <span class="nav-link-text">{{__('Products')}}</span>
                        </a>
                        <div class="collapse {{request()->routeIs('product.*') ? 'show':''}}" id="product-nav">
                            <ul class="nav nav-sm flex-column">
                                @can ('product-view')
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('product.index') ? 'active':''}}" href="{{route('product.index')}}">
                                        <span class="sidenav-mini-icon"> P </span>
                                        <span class="sidenav-normal"> {{__('Product List')}} </span>
                                    </a>
                                </li>
                                @endcan
                                @can ('cat-view')
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('product.category.index') ? 'active':''}}" href="{{route('product.category.index')}}">
                                        <span class="sidenav-mini-icon"> C </span>
                                        <span class="sidenav-normal"> {{__('Category')}} </span>
                                    </a>
                                </li>
                                @endcan
                                @can ('brand-view')
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('product.brand.index') ? 'active':''}}" href="{{route('product.brand.index')}}">
                                        <span class="sidenav-mini-icon"> B </span>
                                        <span class="sidenav-normal"> {{__('Brands')}} </span>
                                    </a>
                                </li>
                                @endcan
                                @can ('attr-view')
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('product.attribute.index') ? 'active':''}}" href="{{route('product.attribute.index')}}">
                                        <span class="sidenav-mini-icon"> A </span>
                                        <span class="sidenav-normal"> {{__('Attributes')}} </span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcanany

                    @can ('order-view')
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('orders.index') ? 'active':''}}" href="{{route('orders.index')}}">
                            <i class="ni ni-delivery-fast text-info"></i>
                            <span class="nav-link-text">Order List</span>
                        </a>
                    </li>
                    @endcan

                    @can ('customer-view')
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('customer.index') ? 'active':''}}" href="{{route('customer.index')}}">
                            <i class="ni ni-satisfied text-success"></i>
                            <span class="nav-link-text">Customer List</span>
                        </a>
                    </li>
                    @endcan

                    @canany(['user-view', 'role-view'])
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('user.*') ? 'active':''}}" aria-expanded="{{request()->routeIs('user.*') ? 'true':'false'}}" href="#navbar-user" data-toggle="collapse" role="button" aria-controls="navbar-user">
                            <i class="ni ni-single-02 text-info"></i>
                            <span class="nav-link-text">Users</span>
                        </a>
                        <div class="collapse {{request()->routeIs('user.*') ? 'show':''}}" id="navbar-user">
                            <ul class="nav nav-sm flex-column">
                                @can ('user-view')
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('user.index') ? 'active':''}}" href="{{route('user.index')}}">
                                        <span class="sidenav-mini-icon"> U </span>
                                        <span class="sidenav-normal"> {{__('User List')}} </span>
                                    </a>
                                </li>
                                @endcan
                                @can ('role-view')
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('user.role.index') ? 'active':''}}" href="{{route('user.role.index')}}">
                                        <span class="sidenav-mini-icon"> R </span>
                                        <span class="sidenav-normal"> {{__('User Role')}} </span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                   @endcanany

                    <!--<li class="nav-item">
                        <a class="nav-link {{request()->routeIs('settings') ? 'active':''}}" href="{{route('settings')}}">
                            <i class="ni ni-settings text-warning"></i>
                            <span class="nav-link-text">Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-calendar-grid-58 text-red"></i>
                            <span class="nav-link-text">Calendar</span>
                        </a>
                    </li>-->

                    <!-- Divider -->
                    <hr class="my-3">

                </ul>

            </div>
        </div>
    </div>
</nav>
