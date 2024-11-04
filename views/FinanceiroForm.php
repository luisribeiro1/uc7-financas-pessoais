



<main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-pencil-square"></i> Cadastro e edição de Finanças</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/cardapio-adm" class="btn btn-primary btn-sm">
          <i class="bi bi-arrow-left"></i> Voltar</a>
      </div>
    </div>
  </section>

  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        
        <form action="<?= $baseUrl ?>/financeiro/atualizar" method="post">
            
            <label>Data:</label>
            <input type="date" class="form-control" name="data" id="data"  value="<?= $data ?>" require>
            <br>
            
            <label>Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= $descricao ?></textarea>
            <br>

            <label>Valor:</label>
            <input type="number" class="form-control" name="valor" id="valor" require min="0" step="0.01" value="<?= $valor ?>">
            
            <label>Débito ou Crédito:</label>
            <select name="deb_cred" id="deb_cred" class="form-select">
                <?= $deb_cred ?>
            </select> 
            <br>
            
            <label>Status:</label>
            <select name="status" id="status" class="form-select"><?= $status ?>
            </select>
            <br>
            

            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
        </form>      

      </div>
    </div>
  </section>
</main>