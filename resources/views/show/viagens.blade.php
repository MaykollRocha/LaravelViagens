@extends('show.layouts.main')

@section('title', 'Show Viagens')
@section('typecad', "viagem de $motorista->nome")

@section('styless')
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Configuração do body */
body {
    font-family: Arial, sans-serif;
    background-color: #2c3e50; /* Azul escuro */
    color: #fff; /* Alterei para branco para contrastar com o fundo escuro */
    padding-top: 60px; /* Ajuste conforme necessário para o tamanho do header */
    padding-bottom: 60px; /* Adiciona espaço extra na parte inferior da página */
    display: flex;
    justify-content: center; /* Alinha horizontalmente ao centro */
    align-items: center; /* Alinha verticalmente ao centro */
    min-height: 100vh; /* Garante que o body ocupe toda a altura da tela */
}

/* Estilo para o header */
header {
    width: 100%;
    background-color: #3498db;  /* Azul */
    padding: 10px 20px;
    color: #fff;
    text-align: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000; /* Mantém o cabeçalho acima de outros elementos */
}

/* Container principal que vai centralizar o conteúdo */
.Show {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Alinhamento à esquerda */
    background-color: #ecf0f1; /* Fundo claro */
    padding: 20px;
    padding-top: 20px; /* Ajuste para evitar sobreposição com o header fixo */
    border-radius: 8px;
    border-top: 10px;
    width: 100%;
    max-width: 600px; /* Limita a largura máxima */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Estilo para cada grupo de informações */
.group {
    margin-bottom: 20px;
    padding: 10px;
    background-color: #fff;
    border-radius: 8px;
    width: 100%;
}

.group p {
    font-size: 16px;
    color: #333;
}

/* Estilo para o formulário de deleção */
form {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

button {
    padding: 10px 20px;
    background-color: #e74c3c; /* Vermelho */
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #c0392b; /* Vermelho mais escuro ao passar o mouse */
}

button:focus {
    outline: none; /* Remove o outline padrão */
}

    </style>
@endsection

@section('content')
    <div class="Show">
        <div class="group">
            <p for="modelo">Nome: {{ $motorista->nome }}</p>
        </div>
        <div class="group">
            <p for="ano">Ano de Nacimento: {{ $motorista->data_nascimento }} </p>
            <p for="ano">Idade: {{ \Carbon\Carbon::parse($motorista->data_nascimento)->age }} anos</p>
        </div>
        <div class="group">
            <p for="data_aquisicao">CNH: {{ $motorista->cnh }}</p>
        </div>
        <hr>
        <div class="group">
            <p for="modelo">Modelo: {{ $veiculo->modelo }}</p>
        </div>
        <div class="group">
            <p for="ano">Ano: {{ $veiculo->ano }} </p>
        </div>
        <div class="group">
            <p for="data_aquisicao">Data de Aquisição: {{ $veiculo->ano }}</p>
        </div>
        <div class="group">
            <p for="kms_rodados_aquisicao">KMs Rodados no Momento da Aquisição: {{ $veiculo->kms_rodados_aquisicao }}</p>
        </div>
        <div class="group">
            <p for="renavam">Renavam: {{ $veiculo->renavam }}</p>
        </div>
        <hr>
        <div class="group">
            <p for="KmInical">KMs Iniciais: {{ $viagem->KmInicial }}</p>
        </div>
        <div class="group">
            <p for="KmFinal">KMs Finais: {{ $viagem->KmFinal}}</p>
        </div>
        <div class="group">
            <p for="KmAPercorrer">KMs a percorrer: {{ $viagem->KmFinal - $viagem->KmInicial}}</p>
        </div>
        <form action="{{ route('delete.viagens', $viagem->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Deletar</button>
        </form>
    </div>
@endsection
