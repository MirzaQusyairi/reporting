<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">SIFERNIK</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">SI</a>
    </div>
    <ul class="sidebar-menu">

      <li class="menu-header">MENU UTAMA</li>
      <li class="{{ Request::is('dashboard') ? 'active':'' }}"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dasbor</span></a></li>
      <li class="{{ Request::is('report*') ? 'active':'' }}"><a class="nav-link" href="/report"><i class="fas fa-file-alt"></i> <span>Pelaporan</span></a></li>

      @if (auth()->user()->role == 'administrator')
        <li class="{{ Request::is('user*') ? 'active':'' }}"><a class="nav-link" href="/user"><i class="fas fa-user"></i> <span>Pengguna</span></a></li>
      @endif
      
    </ul>


    </aside>
</div>