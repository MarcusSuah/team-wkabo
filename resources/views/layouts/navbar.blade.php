  <nav class="navbar navbar-expand-lg navbar-dark fixed-top mb-1">
      <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}">
              <i class="bi bi-flag-fill"></i> JAMES PAPY KWABO
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav" >
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#about">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#focus">Key Focus</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#awards">Awards</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#blogs">Blog</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#cta">Join Us</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#contact">Contact</a>
                  </li>
                  @auth
                      <li class="nav-item">
                          <a class="nav-link btn btn-primary ms-2 px-3" href="{{ route('dashboard') }}">
                              Dashboard
                          </a>
                      </li>

                      <li class="nav-item">
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button class="nav-link btn btn-outline-danger ms-2 px-3">
                                  Logout
                              </button>
                          </form>
                      </li>
                  @else
                      <li class="nav-item">
                          <a class="nav-link btn btn-primary ms-2 px-3" href="{{ route('login') }}">
                              Login
                          </a>
                      </li>
                  @endauth

              </ul>
          </div>
      </div>
  </nav>
