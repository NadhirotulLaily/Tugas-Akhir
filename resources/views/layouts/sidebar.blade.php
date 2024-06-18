<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">SIKOMA-TI</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        @section('sidebar')
        
        <li class="nav-item dropdown">
            <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
        </li>

        @can('index-user')
        <li class="nav-item dropdown">
            <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-users"></i><span>User List</span></a>
        </li>
        @endcan
        
        @can('index-rekap')
        <li class="nav-item dropdown">
            <a href="{{ route('rekap.index') }}" class="nav-link"><i class="fas fa-book"></i><span>Rekap Kompen</span></a>
        </li>
        @endcan

        @can('index-admin')
        <li class="nav-item dropdown">
            <a href="{{ route('tugas.index') }}" class="nav-link"><i class="fas fa-solid fa-list"></i><span>Tugas</span></a>
        </li>
        @endcan
        
        @can('index-tugas')
        @if(auth()->user()->role == 'user')
        <li class="menu-header">Tugas</li>
        <li class="nav-item dropdown">
            <a href="{{ route('pilihtugas.index') }}" class="nav-link"><i class="fas fa-solid fa-list"></i><span>Pilih Tugas</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ route('pilihtugas.upload') }}" class="nav-link"><i class="fas fa-solid fa-list"></i><span>Upload Tugas</span></a>
        </li>
        @endif
        @endcan

        @can('index-admin')
        <li class="nav-item dropdown">
            <a href="{{ route('cektugas.index') }}" class="nav-link"><i class="fas fa-solid fa-list"></i><span>Cek Tugas</span></a>
        </li>
        @endcan

        @show

    </ul>


    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
    </div>
</aside>