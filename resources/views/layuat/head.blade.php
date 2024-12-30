<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Punto de Encuentro </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="//code.tidio.co/iqvr4nkrghcntt7wm9gnthok0ul6dyam.js" async></script>
    <link rel="stylesheet" href="{{ asset('curso/style.css') }}">
    @yield('styles')
</head>
<body>

<!-- Header Mejorado con Navbar -->
<header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('lodi.png') }}" alt="Logo" style="height: 50px; width: auto;" class="img-fluid">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('index') }}"><i class="bi bi-house-door-fill"></i> Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/mision') }}"><i class="bi bi-briefcase-fill"></i> Vision & Mision</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-success " href="{{ route('home.create') }}" ><i class="bi bi-arrow-right-circle-fill"></i> Inscripcion cursos</a>
            </li>
          </ul>
          <!-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
        </div>
      </div>
    </nav>
  </header>
<main>
@yield('contenido')

</main>
<!-- Footer -->
<footer id="page-footer" class="footer-relative">
    <p>© <span id="anio"></span> Punto de Encuentro | Contacto: info@puntoencuentro.com</p>
    <div class="social-icons">
      <a href="https://facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
      <a href="https://twitter.com" target="_blank"><i class="bi bi-twitter"></i></a>
      <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
      <a href="https://linkedin.com" target="_blank"><i class="bi bi-linkedin"></i></a>
  </div>
</footer>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="{{ asset('curso/script.js') }}"></script>
@yield('script')



</body>
</html>