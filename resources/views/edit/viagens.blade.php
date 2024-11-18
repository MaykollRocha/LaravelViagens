@extends('edit.layouts.main')

@section('title', 'Editor Viagens')
@section('typecad', "viagem do motorista $motorista->nome")

@section('styless')
    <link rel="stylesheet" href="/css/editViagens.css">
@endsection

@section('content')

    <div class="form-container">
        <form action="{{ route('update.viagens', $viagem->id) }}" method="post" class="form">
            @csrf
            @method('PUT')
            <hr>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ $motorista->nome }}"><br><br>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento"
                    max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" value="{{ $motorista->data_nascimento }}"><br><br>
            </div>
            <div class="form-group">
                <label for="cnh">N° da CNH:</label>
                <input type="text" id="cnh" name="cnh" pattern="\d+" title="A CNH deve conter apenas números" value="{{ $motorista->cnh }}" ><br><br>
            </div>
            <hr>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" value="{{ $veiculo->modelo }}" required><br><br>
            </div>
            <div class="form-group">
                <label for="ano">Ano:</label>
                <input type="number" id="ano" name="ano" min="1900" max="2099" value="{{ $veiculo->ano }}" required><br><br>
            </div>
            <div class="form-group">
                <label for="data_aquisicao">Data de Aquisição:</label>
                <input type="date" id="data_aquisicao" name="data_aquisicao" value="{{ $veiculo->data_aquisicao }}" required><br><br>
            </div>
            <div class="form-group">
                <label for="kms_rodados_aquisicao">KMs Rodados no Momento da Aquisição:</label>
                <input type="number" id="kms_rodados_aquisicao" name="kms_rodados_aquisicao" min="0" value="{{ $veiculo->kms_rodados_aquisicao }}" required><br><br>
            </div>
            <div class="form-group">
                <label for="renavam">Renavam:</label>
                <input type="text" id="renavam" name="renavam" pattern="\d{11}" title="O Renavam deve ter 11 dígitos" value="{{ $veiculo->renavam }}" required><br><br>
            </div>
            <hr>
            <div class="form-group">
                <label for="KmInicial">Quilometragem Inicial:</label>
                <input type="number" name="KmInicial" id="KmInicial" step="0.1" value="{{ $viagem->KmInicial }}">
            </div>

            <div class="form-group">
                <label for="KmFinal">Quilometragem Final:</label>
                <input type="number" name="KmFinal" id="KmFinal" step="0.1" value="{{ $viagem->KmFinal }}">
            </div>
            <button type="submit" class="submit-btn">Editar</button>
        </form>

    </div>
@endsection
