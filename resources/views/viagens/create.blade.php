@extends('viagens.layouts.main')

@section('title', 'Cadastro Veiculos')
@section('typecad', 'Veiculos')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/erros.css') }}">
@endsection

@section('content')
<div class="form-container">
    <form action="{{ route('viagem.store') }}" method="POST" class="form">
        @csrf

        <div class="form-group">
            <label for="renavam">Renavam do Veículo:</label>
            <input type="text" name="renavam" id="renavam" value="{{ old('renavam') }}">
        </div>

        <div class="form-group">
            <label for="cnh">CNH do Motorista(s):</label>
            <div id="cnh-fields">
                <input type="text" name="cnh[]" id="cnh" value="{{ old('cnh.0') }}">
            </div>
            <button type="button" id="add-cnh">Adicionar CNH</button>
        </div>

        <div class="form-group">
            <label for="KmInicial">Quilometragem Inicial:</label>
            <input type="number" name="KmInicial" id="KmInicial" step="0.1" >
        </div>

        <div class="form-group">
            <label for="KmFinal">Quilometragem Final:</label>
            <input type="number" name="KmFinal" id="KmFinal" step="0.1" >
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
</div>

<script>
    document.getElementById('add-cnh').addEventListener('click', function() {
        var newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'cnh[]';
        document.getElementById('cnh-fields').appendChild(newInput);
    });
</script>
@endsection
