@extends('veiculos.layouts.main')

@section('title', 'Show Veiculos')
@section('typecad', "Detalhes do Veiculo $veiculo->modelo")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
    <div class="Show">
        <div class="group">
            <p for="modelo">Modelo: {{ $veiculo->modelo }}</p>
        </div>
        <div class="group">
            <p for="ano">Ano: {{ $veiculo->ano }} </p>
        </div>
        <div class="group">
            <p for="data_aquisicao">Data de Aquisição: {{ $veiculo->ano }}</p>
        </div>
        <div class="group">
            <p for="kms_rodados_aquisicao">KMs Rodados no Momento da Aquisição: {{ $veiculo->kms_rodados_aquisicao }}</p>
        </div>
        <div class="group">
            <p for="renavam">Renavam: {{ $veiculo->renavam }}</p>
        </div>

        <form action="{{ route('veiculo.delete', $veiculo->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Deletar</button>
        </form>
    </div>
@endsection
