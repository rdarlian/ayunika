<aside id="sidebar">
  <div class="h-100">
    <div class="sidebar-logo">
      <a class="text-decoration-none" href="#">Ayunika</a>
    </div>
    <!-- Sidebar Navigation -->
    <ul class="sidebar-nav">
      <li class="sidebar-item">
        <a href="/dashboard/home" class="sidebar-link {{ Request::is('dashboard/home*') ? 'active' : '' }}">
          <i class="fa-solid fa-border-all pe-2"></i>
          Dashboard
        </a>
      </li>
      <li class="sidebar-header">
        Admin Control
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/themes" class="sidebar-link {{ Request::is('dashboard/themes*') ? 'active' : '' }}">
          <i class="fa-solid fa-palette pe-2"></i>
          Theme
        </a>
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/users" class="sidebar-link {{ Request::is('dashboard/users*') ? 'active' : '' }}">
          <i class="fa-solid fa-list pe-2"></i>
          User
        </a>
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/posts" class="sidebar-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
          <i class="fa-regular fa-file-lines pe-2"></i>
          News
        </a>
      </li>
      <li class="sidebar-header">
        User
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/undangan" class="sidebar-link {{ Request::is('dashboard/undangan*') ? 'active' : '' }}">
          <i class="fa-solid fa-envelope pe-2"></i>
          Undangan
        </a>
      </li>
      <li class="sidebar-item">
        <a href="/dashboard/guests" class="sidebar-link {{ Request::is('dashboard/guests*') ? 'active' : '' }}">
          <i class="fa-solid fa-users-viewfinder pe-2"></i>
          Daftar Tamu Undangan
        </a>
      </li>
      <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
          <i class="fa-regular fa-file-lines pe-2"></i>
          News
        </a>
        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">Analytics</a>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">Ecommerce</a>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">Crypto</a>
          </li>
        </ul>
      </li>
      <!-- <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                            <i class="fa-solid fa-sliders pe-2"></i>
                            Dashboard
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Dashboard Analytics</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Dashboard Ecommerce</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="fa-regular fa-user pe-2"></i>
                            Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Login</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Register</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-header">
                        Multi Level Nav
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                            <i class="fa-solid fa-share-nodes pe-2"></i>
                            Multi Level
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                    Two Links
                                </a>
                                <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">Link 1</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">Link 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
    </ul>
  </div>
</aside>