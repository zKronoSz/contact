
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<div class="container-fluid login-container d-flex align-items-center justify-content-center">
    <div class="row w-75 shadow-lg rounded-4 overflow-hidden login-card">

        <div class="col-md-6 p-5 d-flex flex-column justify-content-center welcome-section">
            <h1 class="text-white mb-3">Bem vindo Magnata!</h1>
            <p class="text-white-50">Você pode fazer login para acessar com sua conta existente.</p>
        </div>

        <div class="col-md-6 p-5 bg-white login-form-section">
            <h2 class="mb-4 sign-in-title">Entrar</h2>


            <form action="<?= BASE_URL ?>/login" method="POST">
                <div class="input-group mb-3 custom-input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="input-group mb-3 custom-input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4 options-row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Lembre-me</label>
                    </div>
                    <a href="#" class="forgot-password-link">Esqueceu a senha?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100 sign-in-btn">Logar</button>

                <p class="text-center mt-3 new-here-text">
                    Novo usuário? 
                    <a href="#" class="create-account-link" data-bs-toggle="modal" data-bs-target="#modalCadastro">
                        Criar Conta
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>

<!-- Modal Criar Conta -->
<div class="modal fade" id="modalCadastro" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Criar Conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/DADOSCONTATO/public/registrar">
                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../styles/script.js"></script>
</body>
</html>
