@extends('motoristas.layouts.main')

@section('title', 'Show Motorista')
@section('typecad', "Detalhes do Motorista $motorista->nome")

@section('styles')
    <link rel="stylesheet" href="/css/show.css">
@endsection

@section('content')
    <div class="Show">
        <div class="group">
            <p for="modelo">Nome: {{ $motorista->nome }}</p>
        </div>
        <div class="group">
            <p for="ano">Ano de Nacimento: {{ $motorista->data_nascimento }} </p>
            <p for="ano">Idade: {{ \Carbon\Carbon::parse($motorista->data_nascimento)->age }} anos</p>
        </div>
        <div class="group">
            <p for="data_aquisicao">CNH: {{ $motorista->cnh }}</p>
        </div>

        <form action="{{ route('motorista.delete', $motorista->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Deletar</button>
        </form>
    </div>
@endsection
