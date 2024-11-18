@extends('show.layouts.main')

@section('title', 'Show Viagens')
@section('typecad', "viagem de $motorista->nome")

@section('styles')

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
        <hr>
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
        <hr>
        <div class="group">
            <p for="KmInical">KMs Iniciais: {{ $viagem->KmInicial }}</p>
        </div>
        <div class="group">
            <p for="KmFinal">KMs Finais: {{ $viagem->KmFinal}}</p>
        </div>
        <div class="group">
            <p for="KmAPercorrer">KMs a percorrer: {{ $viagem->KmFinal - $viagem->KmInicial}}</p>
        </div>
        <form action="{{ route('delete.viagens', $viagem->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Deletar</button>
        </form>
    </div>
@endsection