

<!-- views/FinanceiroList.php -->

<h1>REGISTROS FINANCEIROS</h1>
<div class="mb-3 text-end">
    <a href="index.php?rota=adicionar" class="btn btn-success">Adicionar Novo Registro</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Data</th>
            <th>Descrição</th>
            <th>Débito</th>
            <th>Crédito</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($transacoes)): ?>
            <?php foreach ($transacoes as $registro): ?>
                <tr>
                    <td><?php echo date("d/m/Y", strtotime($registro['data'])); ?></td>
                    <td><?php echo htmlspecialchars($registro['descricao']); ?></td>
                    <td><?php echo ($registro['deb_cred'] === 'debito') ? number_format($registro['valor'], 2, ',', '.') : '-'; ?></td>
                    <td><?php echo ($registro['deb_cred'] === 'credito') ? number_format($registro['valor'], 2, ',', '.') : '-'; ?></td>
                    <td>
                        <span style="
                            color: <?php 
                                echo $registro['status'] === 'cancelado' ? 'red' : 
                                     ($registro['status'] === 'pago' ? 'green' : 
                                     ($registro['status'] === 'pendente' ? 'orange' : 'black')); 
                            ?>;
                            font-weight: bold;
                            text-transform: uppercase;
                            
                        ">
                            <?php echo htmlspecialchars($registro['status']); ?>
                        </span>
                    </td>
                    <td>
                        <a href="index.php?rota=atualizar&id=<?php echo $registro['id_financeiro']; ?>" class="btn btn-primary btn-sm">Atualizar</a>
                        <?php if ($registro['status'] === 'pago' || $registro['status'] === 'pendente'): ?>
                            <a href="index.php?rota=cancelar&id=<?php echo $registro['id_financeiro']; ?>" class="btn btn-warning btn-sm">Cancelar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" class="text-center">Nenhum registro encontrado.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
