@extends('layout.default')
@section('title', 'Painel de Controle - Login')
@section('content')
<form action="{{route('register')}}" method="POST" class="w-75">
    @csrf
    <div class="mb-3">
        <img src="/img/marvel-logo-4.png" class="w-100" alt="logo Marvel">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control login_height_form" name="name" placeholder="Nome">
    </div>
    <div class="mb-3">
        <input type="email" class="form-control login_height_form" name="email" placeholder="E-mail">
    </div>
    <div class="mb-3">
        <input type="password" class="form-control login_height_form" name="password" placeholder="Senha">
    </div>
    <div class="d-grid gap-2">
        <input class="login_height_form login_button" type="submit" value="Registrar">
        <a class="btn login_height_form login_button" href="{{route('login.index')}}">Login</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success mb-3">
            {{ session()->get('message') }}
        </div>
    @endif
</form>
@endsection
