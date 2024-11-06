<?php foreach ($financas as $financa): ?>
    <div class="financa">
        <p>Descrição: <?= htmlspecialchars($financa['descricao']) ?></p>
        <p>Valor: R$ <?= number_format($financa['valor'], 2, ',', '.') ?></p>
        <p>Tipo: <?= $financa['tipo'] == 'entrada' ? 'Entrada' : 'Saída' ?></p>
        <p>Data: <?= date('d/m/Y', strtotime($financa['data'])) ?></p>
        <a href="index.php?action=editar&id=<?= $financa['id'] ?>">Editar</a> |
        <a href="index.php?action=deletar&id=<?= $financa['id'] ?>">Deletar</a>
    </div>
<?php endforeach; ?>
