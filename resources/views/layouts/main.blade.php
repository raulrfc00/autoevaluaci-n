<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>            
        @yield('titulo')
    </title>
    @vite(['resources/css/app.css','resources/css/app.scss', 'resources/js/app.js' ])

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Politecnics</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::check() && Auth::user()->rol->nombre == 'Administrador')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dades Mestres
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Tipus d'usuaris</a></li>
                      <li><a class="dropdown-item" href="{{ 'usuaris/' }}">Usuaris</a></li>
                      <li><a class="dropdown-item" href=" {{ 'cicles/' }}">Cicles</a></li>
                      <li><a class="dropdown-item" href="">Mòduls</a></li>
                      <li><a class="dropdown-item" href="#">Assignar Professor</a></li>
    
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#"></a>Assignar Alumnes</li>
                      <li><a class="dropdown-item" href="#"></a>Resultats Aprenentange</li>
                      <li><a class="dropdown-item" href="#"></a>Criteris Avaluació</li>
    
    
                    </ul>
                  </li>
             @elseif (Auth::check() && Auth::user()->rol->nombre == 'Alumne')
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Alumnes
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Auoavaluació</a></li>
                    </ul>
                  </li>
             @elseif (Auth::check() && Auth::user()->rol->nombre == 'Professor')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Professors
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Assignar Alumnes</a></li>
                  <li><a class="dropdown-item" href="#">Resultats Aprenentange</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Autoavaluació Alumnes</a></li>
                </ul>
              </li>
              @else
            </ul>
            <form class="d-flex" role="search">
              <a class="btn btn-outline-success" href="{{ route('login') }}">Login</a>
            </form>
            @endif
          </div>
        </div>
      </nav>

<div class="container-fluid">
    @yield('contenido')
</div>

</body>
</html>