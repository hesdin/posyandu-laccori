<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill pl-2" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" width="120px">
            </a>
        </div>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#input" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i>
                    <span class="ml-3 item-text">Input Data</span>
                </a>
                <ul class="list-unstyled pl-4 w-100 collapse" id="input" style="">
                    {{-- <li class="nav-item">
                        <a class="nav-link pl-3" href="./table_basic.html"><span class="ml-1 item-text">Input Data
                                User</span></a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.keluarga.index') }}"><span
                                class="ml-1 item-text">Input
                                Data Keluarga</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.ibu-hamil.index') }}"><span
                                class="ml-1 item-text">Input Data
                                Ibu Hamil</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.balita.index') }}"><span
                                class="ml-1 item-text">Input
                                Data
                                Balita</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('admin.imunisasi.index') }}">
                    <i class="fe fe-plus-square fe-16"></i>
                    <span class="ml-3 item-text">Imunisasi Vaksin</span>
                </a>
            </li>

            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('admin.balita-posyandu.index') }}">
                    <i class="fe fe-airplay fe-16"></i>
                    <span class="ml-3 item-text">Balita
                        Posyandu</span>
                </a>
            </li>

            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('admin.pemeriksaan-ibu-hamil.index') }}">
                    <i class="fe fe-disc fe-16"></i>
                    <span class="ml-3 item-text">Pemeriksaan
                        Ibu Hamil</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#laporan" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle nav-link">
                    <i class="fe fe-file fe-16"></i>
                    <span class="ml-3 item-text">Laporan</span>
                </a>
                <ul class="list-unstyled pl-4 w-100 collapse" id="laporan" style="">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.balita-posyandu.index') }}"><span
                                class="ml-1 item-text">Balita
                                Posyandu</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.pemeriksaan-ibu-hamil.index') }}"><span
                                class="ml-1 item-text">Pemeriksaan
                                Ibu Hamil</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="btn-box w-100 mt-4 mb-1">
            <a href="{{ route('admin.logout') }}" class="btn mb-2 btn-danger btn-md btn-block">
                <i class="fe fe-log-out fe-12 mx-2"></i><span class="small">Logout</span>
            </a>
        </div>
    </nav>
</aside>
