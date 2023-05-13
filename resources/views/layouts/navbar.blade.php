<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <?php 
            $stock = DB::select('SELECT * from products where stock < min_stock')
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{ count($stock) }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Stok Produk</span>
                <div class="dropdown-divider"></div>
                @foreach ($stock as $st)
                    <a href="{{ url('product') }}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> stok {{ $st->product_name }} sedikit lagi
                    </a>
                @endforeach
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link mr-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <h4>{{ __('Logout') }}  <i class="fa fa-sign-out-alt"></i></h4>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->