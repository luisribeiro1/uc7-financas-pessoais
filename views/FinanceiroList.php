<!-- views/FinanceiroList.php -->

<h1>Registros Financeiros</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Data</th>
            <th>Descrição</th>
            <th>Débito</th>
            <th>Crédito</th>
            <th>Cancelar</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($registros_financeiros)): ?>
            <?php foreach ($registros_financeiros as $registro): ?>
                <tr>
                    <td><?php echo date("d/m/Y", strtotime($registro['data'])); ?></td>
                    <td><?php echo htmlspecialchars($registro['descricao']); ?></td>
                    <td><?php echo ($registro['deb_cred'] === 'debito') ? number_format($registro['valor'], 2, ',', '.') : '-'; ?></td>
                    <td><?php echo ($registro['deb_cred'] === 'credito') ? number_format($registro['valor'], 2, ',', '.') : '-'; ?></td>
                    <td><a href="[[base-url]]/financeiro/cancelar?id=<?php echo $registro['id_financeiro']; ?>" class="btn btn-danger btn-sm">X</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Nenhum registro encontrado.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- $html = file_get_contents("views/financeiro-template.html"); -->