@extends('cadastros.layout.main')

@section('title', 'Cadastro Viagens')
@section('typecad', 'Viagens')
@section('styles')
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/erros.css">
@endsection
@section('content')
    <div class="form-container">
        <form action="{{ route('store.viagens') }}" method="POST" class="form">
            @csrf

            <div class="form-group">
                <label for="renavam">Renavam do Veículo:</label>
                <input type="text" name="renavam" id="renavam" value="{{ old('renavam') }}">
            </div>

            <div class="form-group">
                <label for="cnh">CNH do Motorista:</label>
                <input type="text" name="cnh" id="cnh" value="{{ old('cnh') }}">
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

@endsection
