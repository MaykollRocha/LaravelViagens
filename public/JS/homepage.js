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
