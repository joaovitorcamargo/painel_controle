@extends('layout.default')
@section('title', 'Painel de Controle - Login')
@section('content')
    <form action="{{route('login.auth')}}" method="POST">
    @csrf
    <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="email">
    </div>
    <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="password">
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
