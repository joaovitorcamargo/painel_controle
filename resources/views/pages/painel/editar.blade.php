@extends('layout.painel')
@section('title', 'Painel de Controle - Inserir')
@section('content')
<div class="mt-2">
    <h2>Registrar Heroi</h2>
    <div class="mt-2">
    <form action="{{route('painel.edit.send', $heroi->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="text" class="form-control form-control-md" name="name" placeholder="Nome" value="{{$heroi->name}}">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control form-control-md" name="description" value="{{$heroi->description}}" />
        </div>
        <div class="mb-3">
            <input class="form-control form-control-md" name="photo" type="file">
        </div>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Editar">
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
