<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#"><img src="{{ asset('assets/img/logo_dprd_kepri.png') }}" alt="" style="width: 35px"> SIPERNIK</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">SI</a>
    </div>
    <ul class="sidebar-menu">

      <li class="menu-header">MENU UTAMA</li>
      <li class="{{ Request::is('dashboard') ? 'active':'' }}"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dasbor</span></a></li>
      @if(auth()->user()->role == 'administrator')
        <li class="dropdown {{ Request::is('report*') ? 'active':'' }}">
          <a href="/report" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Histori Ajuan</span></a>
          <ul class="dropdown-menu">
            <li class={{ Request::is('report') ? 'active':'' }}><a class="nav-link" href="/report">Berdasarkan Pelapor</a></li>
            <li class={{ Request::is('report/filter/all') ? 'active':'' }}><a class="nav-link" href="/report/filter/all">Seluruh Data</a></li>
          </ul>
        </li>
      @else
        <li class="{{ Request::is('report*') ? 'active':'' }}"><a class="nav-link" href="/report"><i class="fas fa-file-alt"></i> <span>Histori Ajuan</span></a></li>
      @endif

      @if (auth()->user()->role == 'administrator')
        <li class="{{ Request::is('user*') ? 'active':'' }}"><a class="nav-link" href="/user"><i class="fas fa-user"></i> <span>Atur Pengguna</span></a></li>
      @endif
      
    </ul>


    </aside>
</div>