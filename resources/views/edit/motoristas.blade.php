@extends('edit.layouts.main')

@section('title', 'Editor Motorista')
@section('typecad', $motorista->nome)

@section('styless')
    <link rel="stylesheet" href="/css/edit.css">
@endsection

@section('content')

    <<div class="form-container">
        <form action="{{ route('update.motorista', $motorista->id) }}" method="post" class="form">
            @csrf()
            @method('PUT')
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
            <button type="submit" class="submit-btn">Editar</button>
        </form>

@endsection
