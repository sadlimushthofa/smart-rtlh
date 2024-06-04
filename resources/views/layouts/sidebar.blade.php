<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="warga">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Warga</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('kriteria') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Kriteria</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('bobot') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Nilai Bobot</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('subkriteria') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Sub Kriteria</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('alternatif') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Alternatif</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('perhitungan') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Perhitungan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
            and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
            Pro!</a>
    </div> --}}

</ul>
