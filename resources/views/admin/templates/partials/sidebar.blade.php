<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text mx-3">Halaman Admin SIM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('homeadmin') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSIM" aria-expanded="true" aria-controls="collapse">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kelola Data</span>
        </a>
        <div id="collapseSIM" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('buat.index') }}">Pembuatan SIM </a>
                <a class="collapse-item" href="{{ route('kehilanganSIM.index') }}">Laporan Kehilangan SIM</a>
                <a class="collapse-item" href="{{ route('perpanjanganSIM.index') }}">Perpanjangan SIM</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSTNK" aria-expanded="true" aria-controls="collapseSTNK">
            <i class="fas fa-fw fa-folder"></i>
            <span>Lihat Data</span>
        </a>
        <div id="collapseSTNK" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('buat.index') }}">Pembuatan SIM </a>
                <a class="collapse-item" href="{{ route('kehilanganSIM.index') }}">Laporan Kehilangan SIM</a>
                <a class="collapse-item" href="{{ route('perpanjanganSIM.index') }}">Perpanjangan SIM</a>
            </div>
        </div>
    </li>
    <!-- Divider -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>