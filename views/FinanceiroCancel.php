<!-- views/FinanceiroCancel.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Cancelamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
        <h2 class="card-title text-center text-danger">Confirmação de Cancelamento</h2>
        
        <!-- Card com informações do registro -->
        <div class="card-body">
            <div class="mb-3">
                <h5 class="card-subtitle text-muted">Data</h5>
                <p class="card-text"><?php echo date("d/m/Y", strtotime($registro['data'])); ?></p>
            </div>
            <div class="mb-3">
                <h5 class="card-subtitle text-muted">Descrição</h5>
                <p class="card-text"><?php echo htmlspecialchars($registro['descricao']); ?></p>
            </div>
            <div class="mb-3">
                <h5 class="card-subtitle text-muted">Valor</h5>
                <p class="card-text">R$ <?php echo number_format($registro['valor'], 2, ',', '.'); ?></p>
            </div>
            <div class="mb-3">
                <h5 class="card-subtitle text-muted">Tipo</h5>
                <p class="card-text"><?php echo ($registro['deb_cred'] === 'debito') ? 'Débito' : 'Crédito'; ?></p>
            </div>
            <div class="mb-3">
                <h5 class="card-subtitle text-muted">Status Atual</h5>
                <p class="card-text"><?php echo htmlspecialchars($registro['status']); ?></p>
            </div>
        </div>

        <!-- Formulário de confirmação de cancelamento -->
        <form action="index.php?rota=confirmarCancelamento" method="POST" class="text-center">
            <input type="hidden" name="id" value="<?php echo $registro['id_financeiro']; ?>">
            <button type="submit" class="btn btn-danger mt-3">Deseja realmente cancelar?</button>
        </form>

        <!-- Botão para voltar sem cancelar -->
        <div class="text-center mt-3">
            <a href="index.php?rota=index" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
