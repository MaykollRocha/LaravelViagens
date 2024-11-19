@extends('main')

@section('title', 'Sitema de Viagens')
@section('styles')
    <link rel="stylesheet" href="css/homepage.css">
@endsection

@section('content')
<div class="Container" id="motoristas">
    <h2>Motoristas Disponiveis</h2>
    <x-alerts/>
    @if ($motoristas->count() > 0)
        <table>
            <thead>
                <th>Nome</th>
                <th>CNH</th>
                <th>Ação</th>
            </thead>
            <tbody>
                @foreach ($motoristas as $motorista)
                    <tr>
                        <td><a href="{{route('motorista.show', $motorista->id)}}">{{ $motorista->nome }}</a></td>
                        <td>{{ $motorista->cnh }}</td>
                        <td><a href="{{route('motorista.edit', $motorista->id)}}">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $motoristas->links("pagination::simple-tailwind") }}
        </div>
    @else
        <p>Não há motoristas disponíveis.</p>
    @endif
</div>
@endsection
