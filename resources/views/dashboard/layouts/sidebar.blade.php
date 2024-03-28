<aside class="fixed-top" id="sidebar">
  <div class="h-100" id="sidebar-content">
    <div class="sidebar-logo">
      <a class="text-decoration-none" href="#">
        <img src="{{ asset('/assets/svg/dashboard/logo.svg') }}" alt=""> <img src="{{ asset('/assets/svg/dashboard/ayunika.svg') }}" alt="">
      </a>
    </div>
    <!-- Sidebar Navigation -->
    <ul class="sidebar-nav">
      <li class="sidebar-item">
        <a href="/dashboard/home" class="sidebar-link {{ Request::is('dashboard/home*') ? 'active' : '' }}">
          <i class="fa-solid fa-border-all pe-2"></i>
          Dashboard
        </a>
      </li>
      @if(auth()->user()->is_admin)
      <li class="sidebar-header">
        Landing Page
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/posts" class="sidebar-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
          <i class="fa-regular fa-file-lines pe-2"></i>
          News
        </a>
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/themes" class="sidebar-link {{ Request::is('dashboard/themes*') ? 'active' : '' }}">
          <i class="fa-solid fa-palette pe-2"></i>
          Theme
        </a>
      </li>
      <li class="sidebar-header">
        Admin Control
      </li>

      <li class="sidebar-item">
        <a href="/dashboard/users" class="sidebar-link {{ Request::is('dashboard/users*') ? 'active' : '' }}">
          <i class="fa-solid fa-list pe-2"></i>
          User
        </a>
      </li>

      <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
          <i class="fa-solid fa-database pe-2"></i>
          Master Data
        </a>
        <ul id="pages" class="sidebar-dropdown list-unstyled collapse in show ps-4 ms-2 " data-bs-parent="#sidebar">
          <li class="sidebar-item">
            <a href="/dashboard/greeting" class="sidebar-link {{ Request::is('dashboard/greeting*') ? 'active' : '' }}">Greeting Message</a>
          </li>
          <li class="sidebar-item">
            <a href="/dashboard/song" class="sidebar-link {{ Request::is('dashboard/song*') ? 'active' : '' }}">Songs</a>
          </li>

        </ul>
      </li>


      <li class="sidebar-header">
        User
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/undangan" class="sidebar-link {{ Request::is('dashboard/undangan*') ? 'active' : '' }}">
          <i class="fa-solid fa-envelope pe-2"></i>
          Detail Undangan
        </a>
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/guests" class="sidebar-link {{ Request::is('dashboard/guests*') ? 'active' : '' }}">
          <i class="fa-solid fa-users-viewfinder pe-2"></i>
          Daftar Tamu Undangan
        </a>
      </li>
      @endif
      @if(auth()->user()->is_admin == 0)
      <li class="sidebar-header">
        Undangan
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/user/undangan" class="sidebar-link {{ Request::is('dashboard/undangan*') ? 'active' : '' }}">
          <i class="fa-solid fa-envelope pe-2"></i>
          Detail Undangan
        </a>
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/guests" class="sidebar-link {{ Request::is('dashboard/guests*') ? 'active' : '' }}">
          <i class="fa-solid fa-users-viewfinder pe-2"></i>
          Daftar Tamu Undangan
        </a>
      </li>
      @endif
    </ul>
  </div>
</aside>