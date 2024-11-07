

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Registro Financeiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 600px;">
        <h2 class="card-title text-center">Adicionar Novo Registro Financeiro</h2>
        <div class="card-body">
            <form action="index.php?rota=confirmarAdicao" method="POST">
                <div class="mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" class="form-control" id="data" name="data" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" required>
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
                </div>

                <div class="mb-3">
                    <label for="deb_cred" class="form-label">Tipo</label>
                    <select class="form-select" id="deb_cred" name="deb_cred" required>
                        <option value="debito">Débito</option>
                        <option value="credito">Crédito</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pago">Pago</option>
                        <option value="pendente">Pendente</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">Adicionar</button>
                <a href="index.php?rota=index" class="btn btn-secondary w-100 mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
