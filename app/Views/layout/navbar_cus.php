<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
  <div class="container">
    <h3 class="text-white">Daftar Menu</h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
        <li class="nav-item">
          <strong><a class="nav-link mx-1 text-white" aria-current="page" href="/">Home</a></strong>
        </li>
        <li class="nav-item">
          <strong><a class="nav-link mx-1 text-white" href="/frontend/register">Cart</a></strong>
        </li>
        <li class="nav-item">
          <strong><a class="nav-link mx-1 text-white" href="/frontend/register">Payment</a></strong>
        </li>
        <li class="nav-item">
          <strong><a class="nav-link mx-1 text-white" href="/frontend/register">History</a></strong>
        </li>
        <li class="nav-item">
          <strong><a class="nav-link mx-1 text-white" href="/customer/logout">Logout</a></strong>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <strong><?= session('nama'); ?></strong>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Profil</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>