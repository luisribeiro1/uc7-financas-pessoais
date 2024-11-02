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
        <?php if (!empty($transacoes)): ?>
            <?php foreach ($transacoes as $registro): ?>
                <tr>
                    <!-- Exibe a data no formato d/m/Y -->
                    <td><?php echo date("d/m/Y", strtotime($registro['data'])); ?></td>
                    
                    <!-- Escapa a descrição para evitar problemas de segurança -->
                    <td><?php echo htmlspecialchars($registro['descricao']); ?></td>
                    
                    <!-- Condicional para mostrar valor como Débito ou Crédito -->
                    <td><?php echo ($registro['deb_cred'] === 'debito') ? number_format($registro['valor'], 2, ',', '.') : '-'; ?></td>
                    <td><?php echo ($registro['deb_cred'] === 'credito') ? number_format($registro['valor'], 2, ',', '.') : '-'; ?></td>
                    
                    <!-- Botão de Cancelar com link para a ação cancelar -->
                    <td>
                        <a href="[[base-url]]/financeiro/cancelar/<?php echo $registro['id_financeiro']; ?>" class="btn btn-danger btn-sm">X</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Mensagem caso não haja registros -->
            <tr><td colspan="5">Nenhum registro encontrado.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

