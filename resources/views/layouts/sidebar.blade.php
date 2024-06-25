<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">SIKOMA-TI</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        @section('sidebar')
        
        <li class="nav-item dropdown {{ Route::is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
        </li>
        
        @can('index-user')
        <li class="nav-item dropdown {{ Route::is('user.index') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-users"></i><span>User List</span></a>
        </li>
        @endcan
        
        @can('index-rekap')
        <li class="nav-item dropdown {{ Route::is('rekap.index') ? 'active' : '' }}">
            <a href="{{ route('rekap.index') }}" class="nav-link"><i class="fas fa-book"></i><span>Ketersediaan Kompen</span></a>
        </li>
        @endcan
        
        @can('index-admin')
        <li class="nav-item dropdown {{ Route::is('tugas.index') ? 'active' : '' }}">
            <a href="{{ route('tugas.index') }}" class="nav-link"><i class="fas fa-solid fa-list"></i><span>Tugas</span></a>
        </li>
        @endcan
        
        @can('index-tugas')
        @if(auth()->user()->role == 'user')
            <li class="nav-item dropdown {{ Route::is('pilihtugas.index') || Route::is('pilihtugas.upload') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-solid fa-list"></i><span>Tugas</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::is('pilihtugas.index') ? 'active' : '' }}">
                            <a href="{{ route('pilihtugas.index') }}" class="nav-link"><span>Pilih Tugas</span></a>
                        </li>
                        <li class="{{ Route::is('pilihtugas.upload') ? 'active' : '' }}">
                            <a href="{{ route('pilihtugas.upload') }}" class="nav-link"><span>Upload Tugas</span></a>
                        </li>
                    </ul>
                </li>
            @endif
        @endcan

        
        @can('index-admin')
        <li class="nav-item dropdown {{ Route::is('cektugas.index') ? 'active' : '' }}">
            <a href="{{ route('cektugas.index') }}" class="nav-link"><i class="fas fa-tasks"></i><span>Cek Tugas</span></a>
        </li>
        @endcan
        

        @show

    </ul>

</aside>