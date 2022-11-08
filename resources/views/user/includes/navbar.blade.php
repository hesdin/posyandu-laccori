<nav class="navbar navbar-expand-lg navbar-light bg-white flex-row border-bottom shadow">
    <div class="container-fluid">
        <a class="navbar-brand mx-lg-1 mr-0" href="./index.html">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="navbar-brand-img brand-sm" style="width: 90px">
        </a>
        <button class="navbar-toggler mt-2 mr-auto toggle-sidebar text-muted">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <div class="navbar-slide bg-white ml-lg-4" id="navbarSupportedContent">
            <a href="#" class="btn toggle-sidebar d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="widgets.html">
                        <span class="ml-lg-2">Dashboard</span>
                    </a>
                </li>


                {{-- <li class="nav-item dropdown">
                    <a href="#" id="formsDropdown" class="dropdown-toggle nav-link" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ml-lg-2">Forms</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="formsDropdown">
                        <a class="nav-link pl-lg-2" href="./form_elements.html"><span class="ml-1">Basic
                                Elements</span></a>
                        <a class="nav-link pl-lg-2" href="./form_advanced.html"><span class="ml-1">Advanced
                                Elements</span></a>
                    </div>
                </li> --}}

            </ul>
        </div>
        <form class="form-inline ml-md-auto d-none d-lg-flex searchform text-muted">
            <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
                placeholder="Type something..." aria-label="Search">
        </form>

    </div>
</nav>
