<form action="index.php?action=<?= isset($financa) ? 'atualizar' : 'adicionar' ?>" method="POST">
    <input type="hidden" name="id" value="<?= $financa['id'] ?? '' ?>">

    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" value="<?= $financa['descricao'] ?? '' ?>" required><br>

    <label for="valor">Valor:</label>
    <input type="number" name="valor" value="<?= $financa['valor'] ?? '' ?>" required><br>

    <label for="tipo">Tipo:</label>
    <select name="tipo">
        <option value="entrada" <?= isset($financa) && $financa['tipo'] == 'entrada' ? 'selected' : '' ?>>Entrada</option>
        <option value="saida" <?= isset($financa) && $financa['tipo'] == 'saida' ? 'selected' : '' ?>>Saída</option>
    </select><br>

    <label for="data">Data:</label>
    <input type="date" name="data" value="<?= $financa['data'] ?? '' ?>" required><br>

    <button type="submit">Salvar</button>
</form>
