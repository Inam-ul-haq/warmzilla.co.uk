    <section class="header__bg--black">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="/"
            ><img class="logo--image img-fluid" src="images/black.png"
          /></a>
          <div
            class="d-flex flex-row-reverse justify-content-between for-mobile-device"
          >
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarTogglerDemo01"
              aria-controls="navbarTogglerDemo01"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"
                ><i class="fa fa-bars text-white" aria-hidden="true"></i
              ></span>
            </button>
          </div>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ml-auto navbar-center custom-size">
              <li class="nav-item custom__link--active active">
                <a class="nav-link text-white custm--link--light" href="#"
                  >Home <span class="sr-only">(current)</span></a
                >
              </li>

              <li class="nav-item custom__link--active">
                <a class="nav-link text-white custm--link--light" href="#"
                  >Fabrication</a
                >
              </li>

              <li class="nav-item custom__link--active">
                <a class="nav-link text-white custm--link--light" href="#"
                  >Construction</a
                >
              </li>
              <li class="nav-item custom__link--active">
                <a class="nav-link text-white custm--link--light" href="#"
                  >Design/ Drafting</a
                >
              </li>
              <li class="nav-item custom__link--active">
                <a class="nav-link text-white custm--link--light" href="#"
                  >About</a
                >
              </li>
              <li class="nav-item custom__link--active">
                <a class="nav-link text-white custm--link--light" href="#"
                  >Terms of Trade</a
                >
              </li>
              <li class="nav-item custom__link--active">
                <a class="nav-link text-white custm--link--light" href="#"
                  >Contact</a
                >
              </li>
               @if(@Auth::check())
               <li class="nav-item custom__link--active">
                <a class="nav-link text-white custm--link--light" id="logout_btn" class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
              @else
                <li class="nav-item custom__link--active">
                  <a class="nav-link text-white custm--link--light" href="{{route('login')}}" >Login</a>
                </li>
              @endif
            </ul>
          </div>
        </nav>
      </div>
    </section>
