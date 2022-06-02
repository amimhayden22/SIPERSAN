<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('dashboard') }}">
                SIPERSAN
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('dashboard') }}">
                SIPS
            </a>
        </div>
        @auth
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dasbor</span></a>
            </li>
            @if (Auth::user()->role === 'Pengurus Pondok')
                <li class="menu-header">Master Data</li>
                <li class="{{ (request()->is('dashboard/dormitories*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('dormitories.index') }}"><i class="fas fa-building"></i> <span>Manajemen Asrama</span></a></li>
                <li class="{{ (request()->is('dashboard/rooms*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('rooms.index') }}"><i class="fas fa-bed"></i> <span>Manajemen Kamar</span></a></li>
                <li class="{{ (request()->is('dashboard/students*')) ? 'active' : '' }}"><a class="nav-link" href="#"><i class="fas fa-users"></i> <span>Manajemen Santri</span></a></li>
                {{-- <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Manajemen Santri</span></a>
                    <ul class="dropdown-menu" style="{{  (request()->is('dashboard/students*')) ? 'display: block;' : 'display: none;' }}">
                        <li><a class="nav-link" href="#">Tabel Santri</a></li>
                        <li><a class="nav-link" href="#">Membuat Izin</a></li>
                    </ul>
                </li> --}}
                <li class="{{ (request()->is('dashboard/users*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i> <span>Manajemen User</span></a></li>
                <li class="menu-header">Izin</li>
                <li class="{{ (request()->is('dashboard/transactions*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('transactions.index') }}"><i class="fas fa-users"></i> <span>Data Izin Santri</span></a></li>
            @endif
            @if (Auth::user()->role === 'Pengurus Asrama')
                <li class="menu-header">Izin</li>
                <li class="{{ (request()->is('dashboard/transactions*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('transactions.index') }}"><i class="fas fa-users"></i> <span>Data Izin Santri</span></a></li>
            @endif
            @if (Auth::user()->role === 'Ketua Kamar')
                <li class="menu-header">Izin</li>
                <li class="nav-item dropdown {{  (request()->is('dashboard/transactions*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Izin Santri</span></a>
                    <ul class="dropdown-menu" style="{{  (request()->is('dashboard/transactions*')) ? 'display: block; color: #47c363;' : 'display: none;' }}">
                        <li><a class="nav-link" style="{{  (request()->is('dashboard/transactions')) ? 'color: #47c363;' : '' }}" href="{{ route('transactions.index') }}">Data Izin Santri</a></li>
                        <li><a class="nav-link" style="{{  (request()->is('dashboard/transactions/create')) ? 'color: #47c363;' : '' }}" href="{{ route('transactions.create') }}">Mengajukan Izin Santri</a></li>
                    </ul>
                </li>
            @endif
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
