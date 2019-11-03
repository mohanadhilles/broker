<!-- TOP NAV  -->
<nav class="navbar navbar-expand-lg pos pt-0" id="top-nav">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img alt="" class="nav-logo" src="{{ asset('mery/img/logo.png') }}">
        </a>

        <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"
                data-target="#navbarNavDropdown" data-toggle="collapse" type="button">
            <i class="fas fa-bars fa-2x icon mt-5"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                @guest
                <li class="nav-item nav-login"> <a class="nav-link nav-login-link" href="{{url('login')}}">Log in</a> </li>
                <li class="nav-item nav-signup"> <a class="nav-link nav-signup-link" href="{{url('/register')}}">Sign up</a> </li>
                @endguest
                @auth
                <li class="nav-item nav-login nav-user"> <a class="nav-link nav-user-link" href="{{ route('profile') }}">{{ auth()->user()->name }}</a> </li>
               <li class="nav-item nav-signup nav-logout"> <a class="nav-link nav-logout-link" href="{{ route('logout') }}">logout</a></li>
                @endauth

                <li class="nav-item nav-item--custom">
                    <a class="nav-link nav-link--custom" href="#">Child care </a>
                </li>
                <li class="nav-item nav-item--custom">
                    <a class="nav-link nav-link--custom" href="#">Seneor care</a>
                </li>
                <li class="nav-item nav-item--custom">
                    <a class="nav-link nav-link--custom" href="#">Peta care</a>
                </li>
                <li class="nav-item nav-item--custom">
                    <a class="nav-link nav-link--custom " href="#">Housekeeping</a>
                </li>
                <li class="nav-item nav-item--custom">
                    <a class="nav-link nav-link--custom " href="#" style="line-height: 1.2">For Business
                        <span>List your today</span>
                    </a>
                </li>
                <li class="nav-item nav-item--custom">
                    <a class="nav-link nav-link--custom" href="#">Home Play</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
