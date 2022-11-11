<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill pl-2" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" width="120px">
            </a>
        </div>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Home</span>
                </a>
            </li>

            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('perkembangan.balita') }}">
                    <i class="fe fe-airplay fe-16"></i>
                    <span class="ml-3 item-text">Perkembangan Balita</span>
                </a>
            </li>

            @if (auth()->user()->ibuHamil()->exists())
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fe fe-disc fe-16"></i>
                        <span class="ml-3 item-text">Perkembangan Ibu Hamil</span>
                    </a>
                </li>
            @endif

            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Profile</span>
                </a>
            </li>


        </ul>
        <div class="btn-box w-100 mt-4 mb-1">
            <a href="{{ route('logout') }}" class="btn mb-2 btn-danger btn-md btn-block">
                <i class="fe fe-log-out fe-12 mx-2"></i><span class="small">Logout</span>
            </a>
        </div>
    </nav>
</aside>
