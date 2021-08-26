<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
  <div class="container">
    <h3 class="text-white"> App Management Menu</h3>
    <button class="navbar-toggler btn-secondary active" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
        <li class="nav-item">
          <strong><a class="nav-link mx-1 text-white" aria-current="page" href="/">Dashoard</a></strong>
        </li>
        <li class="nav-item">
          <strong><a class="nav-link mx-1 text-white" href="/backend/product">Data Product</a></strong>
        </li>
        <li class="nav-item">
          <strong><a class="nav-link mx-1 text-white" href="/backend/user">Data Users</a></strong>
        </li>
        <li class="nav-item">
          <strong><a class="nav-link mx-1 text-white" href="/backend/payment">Data Payment</a></strong>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <strong><?= session('nama'); ?></strong>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/backend/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>