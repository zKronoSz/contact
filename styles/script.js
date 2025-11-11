document.addEventListener('DOMContentLoaded', function() {
    console.log('Página de Login carregada.');
    
    const loginForm = document.querySelector('form');
    loginForm.addEventListener('submit', function(event) {
        const usernameInput = loginForm.querySelector('input[name="username_email"]');
        const passwordInput = loginForm.querySelector('input[name="password"]');

        if (!usernameInput.value || !passwordInput.value) {
            console.log("Preencha todos os campos!");
        }
    });
});

//dashboard
$(document).ready(function() {
    var table = $('#contatosTable').DataTable({
        "searching": true,
        "paging": true,
        "info": false,
        "lengthChange": false,
        "pageLength": 10,
        "order": [[ 0, "asc" ]],
        
        "dom": '<"top"f>rt<"bottom"p><"clear">',

        "language": {
            "search": "",
            "searchPlaceholder": "Pesquisar por Nome",
            "paginate": {
                "next": '<i class="bi bi-arrow-right"></i>',
                "previous": '<i class="bi bi-arrow-left"></i>'
            },
            "emptyTable": "Nenhum contato encontrado."
        }
    });

    // Oculta o div de filtro padrão gerado pelo DataTables.
    $('.dataTables_filter').hide();


    // Cria o novo campo de pesquisa conforme a imagem e o liga ao DataTables.
    var customSearchInput = `
        <div class="input-group me-2" style="max-width: 350px;">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" id="customSearch" class="form-control" placeholder="Pesquisar por Nome">
        </div>
        <button class="btn btn-outline-secondary" title="Adicionar Contato"><i class="bi bi-pencil-square"></i></button>
    `;
    
    // Adiciona o campo customizado no topo.
    $('.container .row:first').before('<div class="d-flex justify-content-end mb-3">' + customSearchInput + '</div>');
    
    // Liga o novo campo de busca ao DataTables.
    $('#customSearch').on('keyup', function () {
        table.search(this.value).draw();
    });

    // Atualiza o contador de resultados ao desenhar a tabela.
    function updateResultsCount() {
        var count = table.page.info().recordsDisplay;
        $('#resultados-count').text(count + ' resultados');
    }
    
    table.on('draw.dt', updateResultsCount);
    updateResultsCount();
});