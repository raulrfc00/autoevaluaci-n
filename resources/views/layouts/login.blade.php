@extends('layouts.main')

@section('titulo')
    Login
@endsection

@section('contenido')

<div class="card">
    <div class="card-body">
        <form action="{{ action([App/Http/Controllers\UsuarioController::class, 'login']) }} " method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            
            <a href="{{ url('/')}}" class="btn btn-secondary float-right ms-1"> <i class="fa fa-times" aria-hiden="true"></i>
                Cancelar</a>
                <button type="submit" class="btn btn-primary flight-right"><i class="fa fa-check" aria-hidden="true"></i>
                Aceptar</button>
        </form>

    </div>
</div>


@endsection