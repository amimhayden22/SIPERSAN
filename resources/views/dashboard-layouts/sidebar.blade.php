<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('dashboard') }}">
                <img class="img-fluid" src="{{ asset('backend/assets/img/logo/red-logo.png') }}" width="120" alt="Sadasa Red Logo">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('dashboard') }}">
                <img src="{{ asset('backend/assets/img/logo/logo-sadasa-circle.png') }}" alt="Logo Circle" width="50" class="img-fluid">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::path() === 'dashboard' ? 'active' : '' }}">
                <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="{{ (request()->is('dashboard/users*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Akun Pengguna</span></a></li>
        </ul>
        @auth
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::path() === 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
            <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice"></i> <span>Accounts</span></a>
                <ul class="dropdown-menu" style="{{ Request::path() === 'dashboard/accounts' ? 'display: block;' : 'display: none;' }}">
                    <li><a class="nav-link" href="#">Accounts Umum</a></li>
                </ul>
            </li> -->
            <li class="{{ (request()->is('dashboard/clients*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('clients.index') }}"><i class="fas fa-users"></i> <span>Client</span></a></li>
        </ul>
        <div class="p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-danger btn-lg btn-block btn-icon-split"
            data-confirm="Apakah kamu yakin?| Klik tombol 'yes' untuk melanjtukan keluar dari halaman admin."
            data-confirm-yes="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        @endauth
    </aside>
</div>
