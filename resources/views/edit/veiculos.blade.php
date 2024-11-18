@extends('edit.layouts.main')

@section('title', 'Editor Veiculos')
@section('typecad', $veiculo->modelo)

@section('styless')
    <link rel="stylesheet" href="/css/editViagens.css">
@endsection

@section('content')

    <div class="form-container">
        <form action="{{ route('update.veiculos', $veiculo->id) }}" method="post" class="form">
            @csrf
            <input type="hidden" name="_method" value="PUT">

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
            <button type="submit" class="submit-btn">Editar</button>
        </form>

    </div>
@endsection
