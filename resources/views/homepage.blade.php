@extends('main')

@section('title', 'Sitema de Viagens')
@section('styles')
    <link rel="stylesheet" href="css/homepage.css">
@endsection

@section('content')
    <div class="tabs">
        <button class="tab-button" onclick="showTab('veiculos')">Veículos</button>
        <button class="tab-button" onclick="showTab('motoristas')">Motoristas</button>
        <button class="tab-button" onclick="showTab('viagens')">Viagens</button>
    </div>

    <div class="Container" id="veiculos" style="display: none;">
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
                            <td><a href="{{route('show.veiculos', $veiculo->id)}}">{{ $veiculo->modelo }}</a></td>
                            <td>{{ $veiculo->ano }}</td>
                            <td>{{ $veiculo->renavam }}</td>
                            <td><a href="{{route('edit.veiculos', $veiculo->id)}}">Editar</a></td>
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

    <div class="Container" id="motoristas" style="display: none;">
        <h2>Motoristas Disponiveis</h2>
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
                            <td><a href="{{route('show.motorista', $motorista->id)}}">{{ $motorista->nome }}</a></td>
                            <td>{{ $motorista->cnh }}</td>
                            <td><a href="{{route('edit.motorista', $motorista->id)}}">Editar</a></td>
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

    <div class="Container" id="viagens" style="display: none;">
        <h2>Viagens em Andamento</h2>
        @if($viagens->count() == 0)
            <p>Não há viagens em andamento.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nome do Motorista</th>
                        <th>Veículo de Transporte</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viagens as $viagem)
                        <tr>
                            <td><a href="{{route('show.viagens', $viagem->id)}}">{{ $viagem->motorista->nome }}</a></td>
                            <td>{{ $viagem->veiculo->modelo }}</td>
                            <td><a href="{{route('edit.viagens', $viagem->id)}}">Editar</a></td>
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

@section('scripts')
    <script>
        // Função para mostrar as abas
        function showTab(tabName) {
            // Esconde todas as abas
            const tabs = document.querySelectorAll('.Container');
            tabs.forEach(tab => tab.style.display = 'none');

            // Exibe a aba correspondente
            const activeTab = document.getElementById(tabName);
            if (activeTab) {
                activeTab.style.display = 'block';
            }

            // Armazena a aba atual no localStorage
            localStorage.setItem('activeTab', tabName);
        }

        // Função para restaurar a página e a aba
        function restoreState() {
            // Verifica se existe uma aba armazenada no localStorage
            const activeTab = localStorage.getItem('activeTab') || 'viagens'; // 'viagens' é a aba padrão
            showTab(activeTab);

            // Verifica se existe uma página salva para a tabela
            const currentPage = localStorage.getItem(`${activeTab}_page`) || 1;

            // Muda para a página salva da tabela, se existir
            const paginator = document.querySelector(`#${activeTab} .pagination`);
            if (paginator) {
                const pageLink = paginator.querySelector(`a[href*="page=${currentPage}"]`);
                if (pageLink) {
                    pageLink.click();
                }
            }
        }

        // Salva a página atual ao clicar em um link de paginação
        document.addEventListener('click', function(event) {
            if (event.target.matches('.pagination a')) {
                const activeTab = localStorage.getItem('activeTab') || 'viagens';
                const page = new URL(event.target.href).searchParams.get('page');
                localStorage.setItem(`${activeTab}_page`, page);
            }
        });

        // Restaura o estado quando a página é carregada
        window.onload = restoreState;
    </script>
@endsection
