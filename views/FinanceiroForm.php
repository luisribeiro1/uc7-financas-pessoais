<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finanças Pessoais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="views/style.css">
</head>
<body class="bg-dark bg-opacity-10">

  <header class="container-fluid bg-dark shadow-sm ">
    
    <nav class="navbar navbar-expand-lg bg-body-dark">
        <div class="container">
          <a class="navbar-brand fs-3 text-white" href="[[base-url]]/financeiro">Finanças</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link text-white" href="[[base-url]]/financeiro">Finanças</a>
              
            </div>
          </div>
        </div>
      </nav>
  </header>

<main>

<section class="container mt-4">
      <div class="row">
        <div class="col-md-6">
          <span class="fs-4"><i class="bi bi-grid-fill me-1"></i>Criar</span>
        </div>
        
          
      </div>
    </section>



  <section class="container mt-4">
    <div class="row">
        <div class="col-md-6">

            <form action="<?= $baseUrl ?>/financeiro/atualizar" method="post" >
                
                <label> data: </label>
                <input type="date" class="form-control" name="data" id="data" require min="0" step="0.01" value="<?= $data ?>">
                <br>

                <label> Descrição: </label>
                <textarea  class="form-control" name="descricao" id="descricao" ><?= $descricao?></textarea>
                <br>

                <label> Débito: </label>
                <input type="number" class="form-control" name="valor" id="valor" value="<?= $valor?>">
                <br>

                <label> Crédito: </label>
                <input type="number" class="form-control" name="deb_cred" id="deb_cred" value="<?=$deb_cred?>"  >

                <label> Status: </label>
                <input type="checkbox" class="form-check-input" name="status" id="status" value="<?=$status?>"  >
                <br><br>

                <button type="submit" class="btn btn-primary">Criar</button>
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="id_financeiro" value="<?= $id_financeiro?>">
            </form>

        </div>
    </div>
  </section>
</main>

<footer>
    <footer class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <small>&copy; 2024 | Atividade</small>
            </div>
            <div class="col-md-6 text-end">
                <small>Feito com bootstrap</small>
            </div>
        </div>
      </footer>
    </body>
    </html>
  </footer>
  
</body>

</html>
