<!-- <header>
    <div class="px-3 py-2 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <h3>UT Training - Laravel PHP Batch 6 IT Helya</h3>
            </a>

            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                    <a href="#" class="nav-link text-secondary">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"/></svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"/></svg>
                        About
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </div>

    <div class="px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-center">
            <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <button type="button" class="btn btn-light text-dark me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
        </div>
    </div>
</header> -->

<header>
<nav class=" navbar navbar-expand-lg shadow-5-strong ">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png')}}" width="15%">Petshop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services">Layanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/doctors">Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/reservations">Reservasi</a>
        </li>

        
      </ul>
    </div>
  </div>
</nav>
</header>
