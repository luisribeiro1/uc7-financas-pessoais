<!-- views/FinanceiroForm.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Metadados básicos e inclusão do Bootstrap para estilização -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Registro Financeiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Container que centraliza o card de formulário na página -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- Card com sombra e padding para dar destaque e estilo -->
        <div class="card shadow p-4" style="width: 100%; max-width: 600px;">
            <!-- Título do card -->
            <h2 class="card-title text-center">Atualizar Registro Financeiro</h2>
            <div class="card-body">
                <!-- Formulário que envia os dados para a rota de confirmação de atualização -->
                <form action="index.php?rota=confirmarAtualizacao" method="POST">
                    <!-- Campo oculto para enviar o ID do registro a ser atualizado -->
                    <input type="hidden" name="id" value="<?php echo $registro['id_financeiro']; ?>">

                    <!-- Campo de data com valor preenchido do registro -->
                    <div class="mb-3">
                        <label for="data" class="form-label">Data</label>
                        <input type="date" class="form-control" id="data" name="data" value="<?php echo $registro['data']; ?>" required>
                    </div>

                    <!-- Campo de texto para a descrição, escapando caracteres especiais -->
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo htmlspecialchars($registro['descricao']); ?>" required>
                    </div>

                    <!-- Campo numérico para o valor, com step para suportar decimais -->
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="<?php echo $registro['valor']; ?>" required>
                    </div>

                    <!-- Campo de seleção para escolher entre Débito e Crédito -->
                    <div class="mb-3">
                        <label for="deb_cred" class="form-label">Tipo</label>
                        <select class="form-select" id="deb_cred" name="deb_cred" required>
                            <!-- Se o valor do registro for 'debito', ele aparece como selecionado -->
                            <option value="debito" <?php echo ($registro['deb_cred'] === 'debito') ? 'selected' : ''; ?>>Débito</option>
                            <!-- Se o valor do registro for 'credito', ele aparece como selecionado -->
                            <option value="credito" <?php echo ($registro['deb_cred'] === 'credito') ? 'selected' : ''; ?>>Crédito</option>
                        </select>
                    </div>

                    <!-- Campo de seleção para escolher o status do registro -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <!-- Se o status for 'pago', ele aparece como selecionado -->
                            <option value="pago" <?php echo ($registro['status'] === 'pago') ? 'selected' : ''; ?>>Pago</option>
                            <!-- Se o status for 'pendente', ele aparece como selecionado -->
                            <option value="pendente" <?php echo ($registro['status'] === 'pendente') ? 'selected' : ''; ?>>Pendente</option>
                            <!-- Se o status for 'cancelado', ele aparece como selecionado -->
                            <option value="cancelado" <?php echo ($registro['status'] === 'cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                        </select>
                    </div>

                    <!-- Botão para submeter o formulário -->
                    <button type="submit" class="btn btn-primary w-100">Atualizar</button>
                    <!-- Botão de cancelar que redireciona para a página principal -->
                    <a href="index.php?rota=index" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Inclusão opcional do Bootstrap JavaScript para funcionalidades como dropdowns -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    