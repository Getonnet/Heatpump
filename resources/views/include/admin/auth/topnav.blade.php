<!-- Navbar -->
<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('main')}}">
            <img src="{{asset('assets/img/brand/logo.svg')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{route('main')}}">
                            <img src="{{asset('assets/img/brand/blue.png')}}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{route('main')}}" class="nav-link">
                        <span class="nav-link-inner--text">Dashboard</span>
                    </a>
                </li>

                @guest

                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <span class="nav-link-inner--text">{{ __('Login') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            <span class="nav-link-inner--text">{{ __('Register') }}</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="nav-link-inner--text">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>