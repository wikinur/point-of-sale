<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link bg-primary" style="text-decoration: none;">
        <img src="{{ asset('asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Point of Sale</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                 <img src="{{ asset('asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('home') }}" style="text-decoration: none;"><h3>{{ auth()->user()->name }}</h3></a>
                <p>{{ auth()->user()->email }}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-laptop"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">MASTER</li>
                <li class="nav-item">
                    <a href="{{ url('category') }}" class="nav-link {{ request()->is('category') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('supplier') }}" class="nav-link {{ request()->is('supplier') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('product') }}" class="nav-link {{ request()->is('product') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-header">TRANSAKSI</li>
                <li class="nav-item">
                    <a href="{{ url('purchase') }}" class="nav-link {{ request()->is('purchase') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-download"></i>
                        <p>Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('sale') }}" class="nav-link {{ request()->is('sale') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>Penjualan</p>
                    </a>
                </li>
                {{-- <li class="nav-header">REPORT</li>
                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Laporan</p>
                    </a>
                </li> --}}
                <li class="nav-header">SETTING</li>
                <li class="nav-item">
                    <a href="{{ url('company') }}" class="nav-link {{ request()->is('company') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Perusahaan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>