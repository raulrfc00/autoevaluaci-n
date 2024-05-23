@extends('layouts.main')

@section('titulo')
    Politecnics
@endsection

@section('navbar')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Politecnics</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Alumnes
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Auoavaluació</a></li>
                </ul>
              </li>
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

        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
@endsection
@section('contenido')
    <div >
       <h2> Politecnics </h2>
    </div>
@endsection