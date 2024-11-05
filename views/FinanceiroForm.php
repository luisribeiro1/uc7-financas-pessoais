<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="[[base-url]]/views/style.css">
    <title>Finanças Pessoais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-dark bg-opacity-10">
  <header class="container-fluid bg-white shadow-sm ">
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container">
          <a class="navbar-brand fs-3 text-dark" href="#">Finanças Pessoais</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link" href="[[base-url]]/sair">Sair</a>
            </div>
          </div>
        </div>
      </nav>
  </header>

  <main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4">Cadastro de uma nova transação</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/financeiro" class="btn btn- btn-md rounded-4">
          <i class="bi bi-arrow-left"></i>Voltar
        </a>
      </div>
    </div>
  </section>
    <section class="container mt-4">
      <div class="row">
        <div class="col-md-6">
          <form action="<?= $baseUrl ?>/financeiro/atualizar/<?= $id_financeiro ?>" method="post">
              <label for="data">Data: </label>
              <input type="date" class="form-control" name="data" id="data" value="<?= $data ?>" required>
              <br>
              
              <label for="descricao">Descrição: </label>
              <textarea class="form-control" name="descricao" id="descricao"><?= $descricao ?></textarea>
              <br>

              <label for="valor">Valor: </label>
              <input type="number" class="form-control" name="valor" id="valor" require min="0" step="0.01" value="<?= $valor ?>" required>
              <br>

              <label for="deb_cred">Débito/Crédito: </label>
              <select name="deb_cred" id="deb_cred" class="form-select">
                  <?= $deb_cred ?>
              </select>
              <br>

              <label for="status">Status: </label>
              <input type="checkbox" class="form-check-input" name="status" id="status" value="Aprovado" <?= $status ?>></input>
              <br>
              
              <br>
              <button type="submit" class="btn btn-primary">Salvar</button>
              <input type="hidden" name="acao" value="<?= $acao ?>">
              <input type="hidden" name="id_financeiro" value="<?= $id_financeiro ?>">
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <small>&copy; 2024 | Finanças Pessoais</small>
        </div>
        <div class="col-md-6 text-end">
            <small>Feito com bootstrap</small>
        </div>
    </div>
  </footer>
</body>