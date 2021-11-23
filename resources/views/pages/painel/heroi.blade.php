@extends('layout.painel')
@section('title', 'Painel de Controle - Favorito')
@section('content')
<div>
<h2>{{$heroi->name}}</h2>
    <img src="{{url("/img/{$heroi->photo}")}}" class="painel-heroi-description-img-width">
    <p>{{$heroi->description}}</p>
</div>
@endsection
