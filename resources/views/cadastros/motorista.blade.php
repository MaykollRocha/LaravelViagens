@extends('cadastros.layout.main')

@section('title', 'Cadastro Motorista')
@section('typecad', 'Motoristas')
@section('styles')
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/erros.css">
@endsection
@section('content')
    <div class="form-container">
        <form action="{{ route('store.motorista') }}" method="post" class="form">
            @csrf()
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}"><br><br>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento"
                    max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" value="{{ old('data_nascimento') }}"><br><br>
            </div>
            <div class="form-group">
                <label for="cnh">N° da CNH:</label>
                <input type="text" id="cnh" name="cnh" pattern="\d+" title="A CNH deve conter apenas números" ><br><br>
            </div>
            <div class="form-group">
            <button type="submit" class="submit-btn">Cadastrar</button>
                    @if ($errors->any())
                        <ul class='erros'>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
            </div>
        </form>


@endsection
