@extends('viagens.layouts.main')

@section('title', 'Editor Viagens')
@section('typecad', "viagem do motorista(s)")

@section('styles')
    <link rel="stylesheet" href="/css/editViagens.css">
@endsection

@section('content')

<div class="form-container">
    <form action="{{ route('viagem.update', $viagem->id) }}" method="POST" class="form">
        @csrf
        @method('PUT')
        @foreach ($motoristas as $motorista)
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $motorista->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" max="{{ date('Y-m-d', strtotime('-18 years')) }}" value="{{ old('data_nascimento', $motorista->data_nascimento) }}" required>
            </div>

            <div class="form-group">
                <label for="cnh">N° da CNH:</label>
                <input type="text" id="cnh" name="cnh" pattern="\d+" title="A CNH deve conter apenas números" value="{{ old('cnh', $motorista->cnh) }}" required>
            </div>

            <hr>
        @endforeach


        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" value="{{ old('modelo', $veiculo->modelo) }}" required>
        </div>

        <div class="form-group">
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" min="1900" max="2099" value="{{ old('ano', $veiculo->ano) }}" required>
        </div>

        <div class="form-group">
            <label for="data_aquisicao">Data de Aquisição:</label>
            <input type="date" id="data_aquisicao" name="data_aquisicao" value="{{ old('data_aquisicao', $veiculo->data_aquisicao) }}" required>
        </div>

        <div class="form-group">
            <label for="kms_rodados_aquisicao">KMs Rodados no Momento da Aquisição:</label>
            <input type="number" id="kms_rodados_aquisicao" name="kms_rodados_aquisicao" min="0" value="{{ old('kms_rodados_aquisicao', $veiculo->kms_rodados_aquisicao) }}" required>
        </div>

        <div class="form-group">
            <label for="renavam">Renavam:</label>
            <input type="text" id="renavam" name="renavam" pattern="\d{11}" title="O Renavam deve ter 11 dígitos" value="{{ old('renavam', $veiculo->renavam) }}" required>
        </div>

        <hr>

        <div class="form-group">
            <label for="KmInicial">Quilometragem Inicial:</label>
            <input type="number" name="KmInicial" id="KmInicial" step="0.1" value="{{ old('KmInicial', $viagem->KmInicial) }}" required>
        </div>

        <div class="form-group">
            <label for="KmFinal">Quilometragem Final:</label>
            <input type="number" name="KmFinal" id="KmFinal" step="0.1" value="{{ old('KmFinal', $viagem->KmFinal) }}" required>
        </div>

        <button type="submit" class="submit-btn">Editar</button>
    </form>
</div>

@endsection
