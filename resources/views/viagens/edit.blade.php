@extends('layouts.main')

@section('title', 'Editor Viagens')
@section('typecad', "Viagem do motorista(s)")
@section('url', route('viagem.index'))

@section('styles')
    <link rel="stylesheet" href="/css/editViagens.css">
@endsection

@section('content')

<div class="form-container">
    <form action="{{ route('viagem.update', $viagem->id) }}" method="POST" class="form">
        @csrf
        @method('PUT')
        @foreach ($motoristas as $index => $motorista)
            <div class="form-group">
                <label for="nome_{{ $index }}">Nome:</label>
                <input type="text" id="nome_{{ $index }}" name="motoristas[{{ $index }}][nome]" value="{{ old("motoristas.$index.nome", $motorista->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="data_nascimento_{{ $index }}">Data de Nascimento:</label>
                <input type="date" id="data_nascimento_{{ $index }}" name="motoristas[{{ $index }}][data_nascimento]" max="{{ date('Y-m-d', strtotime('-18 years')) }}" value="{{ old("motoristas.$index.data_nascimento", $motorista->data_nascimento) }}" required>
            </div>

            <div class="form-group">
                <label for="cnh_{{ $index }}">N° da CNH:</label>
                <input type="text" id="cnh_{{ $index }}" name="motoristas[{{ $index }}][cnh]" pattern="\d+" title="A CNH deve conter apenas números" value="{{ old("motoristas.$index.cnh", $motorista->cnh) }}" required>
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
