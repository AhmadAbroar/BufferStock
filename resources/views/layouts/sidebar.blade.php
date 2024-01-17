<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->is('admin/admin') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                    Data Admin
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pegawais.index') }}" class="nav-link {{ request()->routeIs('pegawais.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>
                    Data Pegawai
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('barang.index') }}" class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-warehouse"></i>
                <p>
                    Data Barang
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('buffer.index') }}" class="nav-link {{ request()->routeIs('buffer.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-warehouse"></i>
                <p>
                    Buffer Stock
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('laporan.masuk') }}" class="nav-link {{ request()->routeIs('laporan.masuk') ? 'active' : '' }}">
                <i class="nav-icon fas fa-print"></i>
                <p>
                    Laporan barang Masuk
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('laporan.keluar') }}" class="nav-link {{ request()->routeIs('laporan.keluar') ? 'active' : '' }}">
                <i class="nav-icon fas fa-print"></i>
                <p>
                    Laporan barang Keluar
                </p>
            </a>
        </li>
    </ul>
</nav>