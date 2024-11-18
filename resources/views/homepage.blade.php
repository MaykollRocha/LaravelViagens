@extends('main')

@section('title', 'Sitema de Viagens')
@section('styles')
    <link rel="stylesheet" href="css/homepage.css">
@endsection
<?php
    $countMotorista = $motoristas->count();
    $countVeiculo = $veiculos->count();
    $countViagem = $viagens->count();
    $motoristasDisponiveis = $motoristas->where('viagem_id', null);

?>
@section('content')
    <div class="Container" id="viagens">
        <h2>Bem vindo ao sistema de Viagens</h2>
        <h3>Informações Gerais:</h3>
        <p>Quantidade de Motoristas: {{ $countMotorista }}</p>
        <p>Quantidade de Veiculos: {{ $countVeiculo }}</p>
        <p>Quantidade de Viagens: {{ $countViagem }}</p>
        <h3>Disponibilidades:</h3>
        <p>Motorista Disponiceis: {{$motoristasDisponiveis->count()}}</p>
        <p>Carros Disponiceis: {{ $countVeiculo - $countViagem }}</p>
    </div>
@endsection

