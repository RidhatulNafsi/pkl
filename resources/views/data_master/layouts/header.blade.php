<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        {{-- <a class="navbar-brand" href="javascript:;"> Dashboard </a> --}}
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <form>
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" placeholder="Search...">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="nc-icon nc-zoom-split"></i>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav">
          @auth
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Welcome, {{ auth()->user()->name}}
                </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                      <form action="/logout" method="post">
                          @csrf
                          <button class="dropdown-item" type="submit">Logout</button>
                      </form>
                  </li>
              </ul>
           </li>
          
          @else
          <li class="nav-item">
              <a class="nav-link @yield('login')" href="{{ route('login') }}">Login</a>
          </li>
          @endauth
      </ul>          
      </div>
    </div>
  </nav>