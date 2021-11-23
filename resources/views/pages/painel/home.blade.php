@extends('layout.painel')
@section('title', 'Painel de Controle - Home')
@section('content')
<div class="mt-2">
    <h2>Herois</h2>
    <div class="mt-2">
    @if (count($herois))
        <ul class="list-group">
            @foreach ($herois as $heroi)
            <li class="list-group-item d-flex align-items-center">
            <a href="{{route('painel.heroe',['id'=>$heroi->id])}}" class="painel-heroi-page">
                <img src="{{url("/img/{$heroi->photo}")}}" class="painel-heroi-img-width">
                {{$heroi->name}}
            </a>
            @if (Auth::user()->is_admin == 1)
            <a class="btn btn-warning edit" href="{{route('painel.edit',['id'=>$heroi->id])}}">Editar</a>
            <form action="{{route('painel.delete.send',['id'=>$heroi->id])}}" method="POST">
                @csrf
                <button class="btn btn-danger" type="submit">Deletar</button>
            </form>
            @endif
            </li>
            @endforeach
        </ul>
    @else
    <h2>Nenhum heroi registrado</h2>
    @endif
    </div>
</div>
@endsection
