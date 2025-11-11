<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 8px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Painel de Contatos</span>
            <div class="d-flex align-items-center">
                <span class="text-white me-3">Olá, <?= htmlspecialchars($usuario['nome']) ?>!</span>
                <a href="<?= BASE_URL ?>/logout" class="btn btn-outline-light btn-sm">Sair</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Seus Contatos</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalContato">
                <i class="bi bi-person-plus"></i> Novo Contato
            </button>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table id="contatosTable" class="table table-hover table-borderless align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>Número</th>
                            <th>Status</th>
                            <th>Criado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($contatos)): ?>
                            <?php foreach ($contatos as $c): ?>
                                <tr>
                                    <td>
                                        <img src="https://i.pravatar.cc/32?u=<?= $c['id'] ?>" class="avatar">
                                        <?= htmlspecialchars($c['nome']) ?>
                                    </td>
                                    <td><?= htmlspecialchars($c['numero']) ?></td>
                                    <td>
                                        <span class="badge bg-<?= $c['status'] === 'on' ? 'success' : 'secondary' ?>">
                                            <?= strtoupper($c['status']) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($c['criado_em']) ?></td>

                                                                <!-- Excluir contato -->

                                    <td class="text-end">
                                        <button
                                            class="btn btn-sm btn-warning me-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editarContatoModal"
                                            data-id="<?= $c['id'] ?>"
                                            data-nome="<?= htmlspecialchars($c['nome']) ?>"
                                            data-numero="<?= htmlspecialchars($c['numero']) ?>"
                                            data-status="<?= htmlspecialchars($c['status']) ?>">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <form method="POST" action="<?= BASE_URL ?>/dashboard/deletarContato" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $c['id'] ?>">
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este contato?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>




                                <!-- Modal Editar Contato -->
                                <div class="modal fade" id="editarContatoModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Contato</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="POST" action="<?= BASE_URL ?>/dashboard/editarContato">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" id="edit-id">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nome</label>
                                                        <input type="text" name="nome" id="edit-nome" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Número</label>
                                                        <input type="text" name="numero" id="edit-numero" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Status</label>
                                                        <select name="status" id="edit-status" class="form-select">
                                                            <option value="on">On</option>
                                                            <option value="off">Off</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button class="btn btn-primary">Salvar Alterações</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Nenhum contato cadastrado ainda.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Criar Contato -->
    <div class="modal fade" id="modalContato" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Contato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="<?= BASE_URL ?>/dashboard/criarContato">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Número</label>
                            <input type="text" name="numero" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="on">On</option>
                                <option value="off">Off</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contatosTable').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                },
                order: [
                    [3, 'desc']
                ]
            });
        });

        const editarModal = document.getElementById('editarContatoModal');
        editarModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nome = button.getAttribute('data-nome');
            const numero = button.getAttribute('data-numero');
            const status = button.getAttribute('data-status');

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-nome').value = nome;
            document.getElementById('edit-numero').value = numero;
            document.getElementById('edit-status').value = status;
        });
    </script>

</body>

</html>