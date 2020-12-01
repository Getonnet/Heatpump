<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="{{route('main')}}">
                <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="Logo">
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

                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('product.*') ? 'active':''}}" aria-expanded="{{request()->routeIs('product.*') ? 'true':'false'}}" href="#product-nav" data-toggle="collapse" role="button" aria-controls="product-nav">
                            <i class="ni ni-bag-17 text-danger"></i>
                            <span class="nav-link-text">{{__('Products')}}</span>
                        </a>
                        <div class="collapse {{request()->routeIs('product.*') ? 'show':''}}" id="product-nav">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('product.index') ? 'active':''}}" href="{{route('product.index')}}">
                                        <span class="sidenav-mini-icon"> P </span>
                                        <span class="sidenav-normal"> {{__('product List')}} </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('product.category.index') ? 'active':''}}" href="{{route('product.category.index')}}">
                                        <span class="sidenav-mini-icon"> C </span>
                                        <span class="sidenav-normal"> {{__('Category')}} </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('product.brand.index') ? 'active':''}}" href="{{route('product.brand.index')}}">
                                        <span class="sidenav-mini-icon"> B </span>
                                        <span class="sidenav-normal"> {{__('Brands')}} </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('product.attribute.index') ? 'active':''}}" href="{{route('product.attribute.index')}}">
                                        <span class="sidenav-mini-icon"> A </span>
                                        <span class="sidenav-normal"> {{__('Attributes')}} </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-delivery-fast text-info"></i>
                            <span class="nav-link-text">Order List</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-atom text-primary"></i>
                            <span class="nav-link-text">Questions</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('user.*') ? 'active':''}}" aria-expanded="{{request()->routeIs('user.*') ? 'true':'false'}}" href="#navbar-user" data-toggle="collapse" role="button" aria-controls="navbar-user">
                            <i class="ni ni-ui-04 text-info"></i>
                            <span class="nav-link-text">Users</span>
                        </a>
                        <div class="collapse {{request()->routeIs('user.*') ? 'show':''}}" id="navbar-user">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('user.index') ? 'active':''}}" href="{{route('user.index')}}">
                                        <span class="sidenav-mini-icon"> U </span>
                                        <span class="sidenav-normal"> {{__('User List')}} </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('user.role.index') ? 'active':''}}" href="{{route('user.role.index')}}">
                                        <span class="sidenav-mini-icon"> R </span>
                                        <span class="sidenav-normal"> {{__('User Role')}} </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('demo.*') ? 'active':''}}" aria-expanded="{{request()->routeIs('demo.*') ? 'true':'false'}}" href="#navbar-components2" data-toggle="collapse" role="button" aria-controls="navbar-components2">
                            <i class="ni ni-ui-04 text-info"></i>
                            <span class="nav-link-text">Demo</span>
                        </a>
                        <div class="collapse {{request()->routeIs('demo.*') ? 'show':''}}" id="navbar-components2">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('demo.page') ? 'active':''}}" href="{{route('demo.page')}}">
                                        <span class="sidenav-mini-icon"> P </span>
                                        <span class="sidenav-normal"> Page </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->routeIs('demo.table') ? 'active':''}}" href="{{route('demo.table')}}">
                                        <span class="sidenav-mini-icon"> T </span>
                                        <span class="sidenav-normal"> Table </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-chart-pie-35 text-info"></i>
                            <span class="nav-link-text">Charts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-calendar-grid-58 text-red"></i>
                            <span class="nav-link-text">Calendar</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="my-3">

                </ul>

            </div>
        </div>
    </div>
</nav>
