@extends('main')

@section('title', 'Sitema de Viagens')
@section('styles')
    <link rel="stylesheet" href="css/homepage.css">
@endsection

@section('content')
    <div class="Container" id="viagens">
        <h2>Viagens em Andamento</h2>
        @if($viagens->count() == 0)
            <p>Não há viagens em andamento.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Numero da Viagem</th>
                        <th>Veículo de Transporte</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viagens as $viagem)
                        <tr>
                            <td><a href="{{route('viagem.show', $viagem->id)}}">Viagem {{ $viagem->id}}</a></td>
                            <td>{{ $viagem->veiculo->modelo }}</td>
                            <td><a href="{{route('viagem.edit', $viagem->id)}}">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $viagens->links("pagination::simple-tailwind") }}
            </div>
        @endif
    </div>
@endsection
