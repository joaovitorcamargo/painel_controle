@extends('layout.default')
@section('title', 'Painel de Controle - Login')
@section('content')
<div class="container_login container">
    <div class="row heigth_login">
    <div class="col-md-8 background_login"></div>
        <div class="col-md-4 form_login d-flex align-items-center justify-content-center">
            <form action="" method="POST" class="w-75">
                <h2>Login</h2>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Senha">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Login</button>
                    <hr>
                    <a href="#" class="btn btn-warning">Registrar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
