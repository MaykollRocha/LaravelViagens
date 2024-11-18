@extends('main')

@section('title', 'Sitema de Viagens')
@section('styles')
    <link rel="stylesheet" href="css/homepage.css">
@endsection

@section('content')
    <div class="Container" id="veiculos">
        <h2>Veiculos Disponiveis</h2>
        @if ($veiculos->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Renavam</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veiculos as $veiculo)

                        <tr>
                            <td><a href="{{route('veiculo.show', $veiculo->id)}}">{{ $veiculo->modelo }}</a></td>
                            <td>{{ $veiculo->ano }}</td>
                            <td>{{ $veiculo->renavam }}</td>
                            <td><a href="{{route('veiculo.edit', $veiculo->id)}}">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $veiculos->links("pagination::simple-tailwind") }}
            </div>
        @else
            <p>Não há veículos disponíveis.</p>
        @endif
    </div>
@endsection
