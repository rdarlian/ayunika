<nav class="navbar navbar-expand-lg container">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/assets/svg/Company logo.svg" alt="" /></a>
    <div class="collapse navbar-collapse justify-content-end pe-5 me-4" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "beranda") ? 'active' : '' }}" aria-current="page" href="/#">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/#fitur">Fitur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/#harga">Harga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "themes") ? 'active' : '' }}" href="/template">Template</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "blogs") ? 'active' : '' }}" href="/blogs">Blogs</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse flex-md-row justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/login"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="/logout" method="POST">
                @csrf

                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
          </ul>
        </li>
        @else


        <a href="/login" type="button" class="btn-brown col-md-12 text-decoration-none">
          Login
        </a>
        @endauth
      </ul>

    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>