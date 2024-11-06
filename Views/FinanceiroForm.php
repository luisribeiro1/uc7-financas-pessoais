<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="[[base-url]]views/templates/css/customizado.css">
        <title>Finança Pessoal</title>
</head>
<body class="bg-dark bg-opacity-10">

  <header class="container-fluid bg-white shadow-sm">

    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container">
          <a class="navbar-brand fs-3 text-primary" href="#">Finanças <span class="text-primary fw-bold">PESSOAIS</span></a>
        </div>
    </nav>
</header>

<section class="container mt-3">
    <div class=" col-md-12 text-end">
    <a href="<?= $baseUrl ?>financeiro" class="btn btn-primary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Voltar</a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= $baseUrl ?>financeiro/atualizar" method="post">
    
                <label>Data:</label>
                <input type="date" name="data" id="data" class="form-control" value="<?= $data ?>">
                <br><br>
                
                <label>Descrição:</label>
                <textarea type="text" class="form-control" name="descricao" id="descricao" value="<?= $descricao ?>"></textarea>
                <br>
                
                <label>Valor:</label>
                <input type="number" class="form-control" name="valor" id="valor" value="<?= $valor ?>" require min = "0" step="0.01">
                <br>
                
                <label>Débito/Crédito:</label>
                <select name="deb_cred" id="deb_cred" class="form-select">
                    <?= $deb_cred ?>
                </select>
                <br><br>
                
                <label>Status:</label>
                <input type= "checkbox" class="form-check-input" name="status" id="status" value="<?= $status ?>">
                <br><br>

                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="id_financeiro" value="<?= $id_financeiro ?>">

            </form>
        </div>
    </div>
  </section>
</main>
  
