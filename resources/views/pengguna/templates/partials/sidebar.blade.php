<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text mx-3">E-SS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    @role('admin stnk|admin sim')
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data-user.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('feedback.index') }}">
            <i class="fas fa-fw fa-message"></i>
            <span>Feedback</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('article.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Artikel</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('faq.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>FAQ</span></a>
        @endrole

        @role('admin sim|user')

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSIM" aria-expanded="true" aria-controls="collapse">
            <i class="fas fa-fw fa-folder"></i>
            <span>SIM</span>
        </a>
        <div id="collapseSIM" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pembuatan-sim.index') }}">Pembuatan</a>
                <a class="collapse-item" href="{{ route('kehilangan-sim.index') }}">Kehilangan SIM</a>
                <a class="collapse-item" href="{{ route('perpanjangan-sim.index') }}">Perpanjangan SIM</a>
            </div>
        </div>
    </li>
    @endrole



    @role('admin stnk|user')
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSTNK" aria-expanded="true" aria-controls="collapseSTNK">
            <i class="fas fa-fw fa-folder"></i>
            <span>STNK</span>
        </a>
        <div id="collapseSTNK" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pembuatan-stnk.index') }}">Pembuatan STNK</a>
                <a class="collapse-item" href="{{ route('kehilangan-stnk.index') }}">Kehilangan STNK</a>
                <a class="collapse-item" href="{{ route('perpanjangan-stnk.index') }}">Perpanjangan STNK</a>
            </div>
        </div>
    </li>
    @endrole

    @role('admin sim|admin stnk')
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pembayaran.index') }}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Pembayaran</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengaturan.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span></a>
    </li>
    @endrole

    @role('user')
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - History -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('feedback.index') }}">
            <i class="fas fa-fw fa-message"></i>
            <span>Feedback</span></a>
    </li>

    @endrole

    @role('user')
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - History -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('history.index') }}">
            <i class="fas fa-fw fa-history"></i>
            <span>History</span></a>
    </li>

    @endrole


    <!-- Divider -->
    <hr class=" sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>