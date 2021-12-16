<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#" class="logo">
                Gudang
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#" class="logo">
                {{-- <img src="{{ asset('img/logo.jpeg') }}" width="50" alt="navbar brand"> --}}
            </a>
        </div>
        <ul class="sidebar-menu">
            {{-- Data --}}
            @if (auth()->user()->isAdmin())
                <li class="{{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line"></i> Dashboard</a>
                </li>
                <li class="{{ request()->segment(2) == 'illustrasi' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.illustrasi.index') }}"><i class="fas fa-table"></i> Ilustrasi Letak Produk</a>
                </li>
                <li class="{{ request()->segment(2) == 'employee' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.employee.index') }}"><i class="fas fa-users"></i> Data Karyawan</a>
                </li>
                <li class="{{ request()->segment(2) == 'product' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.product.index') }}"><i class="fas fa-list-alt"></i> Data Produk</a>
                </li>
                <li class="{{ request()->segment(2) == 'category' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.category.index') }}"><i class="fas fa-list-alt"></i> Data Kategori Barang</a>
                </li>
                <li class="{{ request()->segment(2) == 'rack' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.rack.index') }}"><i class="fas fa-server"></i> Data Rak Barang</a>
                </li>
                <li class="{{ request()->segment(2) == 'reseller' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.reseller.index') }}"><i class="fas fa-industry"></i> Data Toko Pengirim</a>
                </li>
                <li class="{{ request()->segment(2) == 'ekspedisi' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.ekspedisi.index') }}"><i class="fas fa-truck"></i> Data Jasa Pengiriman</a>
                </li>
                <li class="{{ request()->segment(2) == 'scan' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.scan.index') }}"><i class="fas fa-qrcode"></i> Scan QR Code</a>
                </li>
                <li class="{{ request()->segment(2) == 'report' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.user.index') }}"><i class="fas fa-file"></i> Laporan Stok Barang</a>
                </li>
                <li class="{{ request()->segment(2) == 'user' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.user.index') }}"><i class="fas fa-user"></i> User Management</a>
                </li>
            @elseif ( auth()->user()->isLeader())
                <li class="{{ request()->segment(2) == 'transaction' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.transaction.index') }}"><i class="fas fa-exchange"></i> Return Barang</a>
                </li>
            @elseif ( auth()->user()->isOperator())
                <li class="{{ request()->segment(2) == 'transaction' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.transaction.index') }}"><i class="fas fa-exchange-alt"></i> Transaksi</a>
                </li>
            @endif
        </ul>
    </aside>
</div>
