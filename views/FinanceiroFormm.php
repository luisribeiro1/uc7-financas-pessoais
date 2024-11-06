<?php

$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>
  <section class="container mt-4">
    <div class="row">

      <div class="col-md-6">
        <span class="fs-4"><span class="text-primary"><i class="bi bi-pencil-square"></i></span><strong> Cadastro e edição do Cardápio</strong></span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?=$baseUrl?>/financeiro" class="btns"><b><i class="bi bi-arrow-left me-1"></i></b>&nbsp;VOLTAR</a>
      </div>
    </div>

      <div class="row mt-4">
          <div class="col-md-6">
            
            <form action="<?= $baseUrl ?>/financeiro/atualizar" method="post">
              
              <label for="data">Data:</label>
              <input class="form-control" type="date" name="data" id="data" value="<?= $data ?>" require>
              <br>

              <label for="valor">Valor:</label>
              <input class="form-control" type="number" name="valor" id="valor" min="0" step="0.01" value="<?= $valor ?>" require placeholder="R$ 0.000,00">
              <br>

              <label for="tipo">Débio:</label>
              <select name="tipo" id="tipo" class="form-select">
                <?= $tipo ?>
              </select>
              <br>

              <label>Descrição:</label>
              <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição do item" require><?= $descricao ?></textarea>
              <br>

              <label for="status">Status:</label>
              <input class="form-check-input" value="1" type="checkbox" name="status" id="status" require <?= $status ?>>
              <br>

              <button class="btn btn-primary mt-3" type="submit">Salvar alterações</button>
              
              <input type="hidden" name="acao" value="<?= $acao ?>">
              <input type="hidden" name="idCardapio" value="<?= $idCardapio ?>">
              
            </form>
          </div>
        
    </div>
  </section>
</main>

<?php
echo $footer;
?>