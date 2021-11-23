@extends('layout.painel')
@section('title', 'Painel de Controle - Inserir')
@section('content')
<div class="mt-2">
    <h2>Registrar Heroi</h2>
    <div class="mt-2">
    <form action="{{route('painel.register.heroes')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control form-control-md" name="name" placeholder="Nome" value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control form-control-md" name="description" placeholder="Descrição" value="{{old('description')}}" />
        </div>
        <div class="mb-3">
            <input class="form-control form-control-md" name="photo" type="file">
        </div>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    </form>
    </div>
</div>
@endsection
