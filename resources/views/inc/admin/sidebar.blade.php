<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    @role('admin')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
            <div class="sidebar-brand-text mx-2">ADMIN</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->segment(1) == 'admin' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    @endrole


    @role('shipper')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('order.index') }}">
            <div class="sidebar-brand-text mx-2">SHIPPER</div>
        </a>
    @endrole


    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi Barang
    </div>

    @role('admin')
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->segment(1) == 'product' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productsCollapse"
                aria-expanded="true" aria-controls="productsCollapse">
                <i class="fas fa-fw fa-th-large"></i>
                <span>Barang</span>
            </a>
            <div id="productsCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Barang :</h6>
                    <a class="collapse-item" href="/product">Manajemen Barang</a>
                    <a class="collapse-item" href="/product/create">Tambah Barang</a>
                </div>
            </div>
        </li>
    @endrole

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item {{ request()->segment(1) == 'orders' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ordersCollapse" aria-expanded="true"
            aria-controls="ordersCollapse">
            <i class="fas fa-fw fa-people-carry"></i>
            <span>Pesanan</span>
        </a>
        <div id="ordersCollapse" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Informasi Pesanan:</h6>
                <a class="collapse-item" href="{{ route('order.index') }}">Manajemen Pesanan</a>
                <a class="collapse-item" href="{{ route('readyToShip.index') }}">Siap Dikirim</a>
                <a class="collapse-item" href="{{ route('shipped.index') }}">Sedang Dikirim</a>
                <a class="collapse-item" href="{{ route('delivered.index') }}">Terkirim</a>
                <a class="collapse-item" href="{{ route('shipCancelled.index') }}">Dibatalkan</a>
                <a class="collapse-item" href="{{ route('returned.index') }}">Pengembalian</a>
            </div>
        </div>
    </li> --}}

    @role('admin')
        <!-- Nav Item - Utilities Collapse Menu -->
        {{-- <li class="nav-item {{ request()->segment(1) == 'flash-sale' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#promotionsCollapse"
                aria-expanded="true" aria-controls="promotionsCollapse">
                <i class="fas fa-fw fa-play"></i>
                <span>Promo</span>
            </a>
            <div id="promotionsCollapse" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Informasi Promo :</h6>
                    <a class="collapse-item" href="{{ route('flashSale.index') }}"> Flash sale</a>
                </div>
            </div>
        </li> --}}
        <li class="nav-item {{ request()->segment(1) == 'category' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shopCollapse" aria-expanded="true"
                aria-controls="shopCollapse">
                <i class="fas fa-fw fa-store"></i>
                <span>Kelola Kategori</span>
            </a>
            <div id="shopCollapse" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Informasi Kategori :</h6>
                    <a class="collapse-item" href="{{ route('category.index') }}">
                        <span> Manajemen Kategori</span>
                    </a>
                    <a class="collapse-item" href="{{ route('category.create') }}">Tambah Kategori</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Feedback
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customerCollapse"
                aria-expanded="true" aria-controls="customerCollapse">
                <i class="fas fa-fw fa-users"></i>
                <span>Feedback Pembeli</span>
            </a>
            <div id="customerCollapse" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('customerQuestion.adminView') }}">feedback</a>
                </div>
            </div>
        </li>
    @endrole

    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi Akun
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accountsCollapse"
            aria-expanded="true" aria-controls="accountsCollapse">
            <i class="fas fa-fw fa-people-carry"></i>
            <span>Akun & Pengaturan</span>
        </a>
        <div id="accountsCollapse" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Informasi Akun :</h6>
                <a class="collapse-item" href="{{ route('admin.profile') }}"> Profil</a>
                @role('admin')
                    <a class="collapse-item" href="{{ route('userManagement.index') }}">Manajemen User</a>
                @endrole
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->
