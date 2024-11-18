@extends('layouts.main')

@section('title', 'Cadastro Veiculos')
@section('typecad', 'Veiculos')
@section('url', route('veiculo.index'))

@section('styles')
<link rel="stylesheet" href="{{ asset('css/forms.css') }}">
<link rel="stylesheet" href="{{ asset('css/erros.css') }}">
@endsection

@section('content')
    <div class="form-container">
            <form action="{{route('veiculo.store')}}" method="post" class="form">
                @csrf()
                <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" value="{{ old('modelo') }}"><br><br>
                </div>
                <div class="form-group">
                <label for="ano">Ano:</label>
                <input type="number" id="ano" name="ano" min="1900" max="2099" value="{{ old('ano') }}"><br><br>
                </div>
                <div class="form-group">
                <label for="data_aquisicao">Data de Aquisição:</label>
                <input type="date" id="data_aquisicao" name="data_aquisicao" value="{{ old('data_aquisicao') }}"><br><br>
                </div>
                <div class="form-group">
                <label for="kms_rodados_aquisicao">KMs Rodados no Momento da Aquisição:</label>
                <input type="number" id="kms_rodados_aquisicao" name="kms_rodados_aquisicao" min="0" value="{{ old('kms_rodados_aquisicao') }}"><br><br>
                </div>
                <div class="form-group">
                <label for="renavam">Renavam:</label>
                <input type="text" id="renavam" name="renavam" pattern="\d{11}" title="O Renavam deve ter 11 dígitos" ><br><br>
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

@endsection
