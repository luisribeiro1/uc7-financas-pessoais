<!doctype html>
<html lang="pt-br">

<head>
   <title>Financeiro MVC | Registrar</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="<?= $baseUrl ?>/views/style.css">
</head>

<body class="bg-secondary bg-opacity-10">

   <main>
      <div class="container mt-5">

         <div class="row d-flex justify-content-center">
            <div class="col-md-5">
               <p class="text-center fs-3 text-primary">Financeiro<span class="text-secondary"> | </span><span class="text-info fw-bold">Pessoal</span></p>
               <div class="card mb-4 rounded-3 shadow-sm ">
                  <div class="d-flex justify-content-between card-header bg-secondary py-3">
                     <h4 class="my-0 fw-normal text-white"><i class="bi bi-file-earmark-plus"></i> <?= $acao ?> Registro:</h4>
                     <a href="<?= $baseUrl ?>/financas" onclick="return confirm('Tem certeza que deseja voltar? Todo campo preenchido será perdido.')" class="my-0 fw-normal text-white link-underline link-underline-opacity-0"><i class="bi bi-arrow-left-short"></i>Voltar</a>
                  </div>
                  <div class="card-body p-4">

                     <!-- <?= $erro ?> -->

                     <p><small>Preencha o campo abaixo:</small></p>

                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/financas/atualizar ">
                        <div class="form-floating mb-3">
                           <input type="date" name="data" id="data" class="form-control" value="<?= $data ?>" require>
                           <label for="data"><i class="bi bi-calendar-plus-fill"></i> Data:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <textarea name="descricao" id="descricao" class="form-control" require><?= $descricao ?></textarea>
                           <label for="descricao"><i class="bi bi-justify-left"></i> Descrição:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="number" name="valor" id="valor" class="form-control" require value="<?= $valor ?>" min="0" step="0.01">
                           <label for="valor"><i class="bi bi-cash-stack"></i></i> Valor:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <select name="deb_cred" id="deb_cred" class="form-select">
                              <?= $deb_cred ?>
                           </select>
                           <label for="deb_cred"><i class="bi bi-wallet2"></i> Tipo de pagamento:</label>
                        </div>
                        <input type="hidden" name="acao" value="<?= $acao ?>">
                        <input type="hidden" name="idfinanca" value="<?= $id ?>">
                        <button type="submit" id="btnEnviar" name="btnEnviar" class="w-100 btn btn-lg btn-secondary">Editar <i class="bi bi-arrow-right"></i></button>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>

</body>

</html>