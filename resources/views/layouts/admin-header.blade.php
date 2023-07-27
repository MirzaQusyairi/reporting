<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      @if(auth()->user()->photo)
        <img alt="image" src="{{ asset('storage/'.str_replace('public/', '', auth()->user()->photo)) }}" class="rounded-circle mr-1" style="max-height: 30px">
      @else
        <img alt="image" src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
      @endif
      <div class="d-sm-none d-lg-inline-block">Halo, 
        @auth
          {{ auth()->user()->name }}
        @endauth
      </div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> Keluar
        </a>
      </div>
    </li>
  </ul>
</nav>

<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
  @csrf
</form>