
<!doctype html>
<html lang="pt-br">

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="financas-pessoais/views/style.css">
</head>

<body class="bg-secondary bg-opacity-10">

<main>
      <div class="container mt-5">

         <div class="row d-flex justify-content-center">
            <div class="col-md-5">
               <p class="fs-3 text-primary text-center">Finanças <span class="text-info fw-bold">Pessoais</span></p>
               <div class="card mb-4 rounded-3 shadow-sm ">
                  <div class="card-header bg-primary py-3">
                     <h4 class="my-0 fw-normal text-white"> <i class="bi bi-bookmark-plus"></i> Cadastro das finanças</h4>
                  </div>
                  <div class="card-body p-4">

                     <p><small>Informe as informações abaixo</small></p>

                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/financeiro/atualizar">
                        <div class="form-floating mb-3">
                           <input type="date" name="data" id="data" class="form-control" value="<?=$data  ?>">
                           <label for="nome"> Data:</label>
                        </div>

                        <div class="form-floating mb-3">
                           <textarea name="descricao" id="descricao" class="form-control"><?= $descricao ?></textarea>
                           <label for="descricao"><i class="bi bi-journal-check"></i> Descrição:</label>
                        </div>
                          
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="valor" id="valor" require min="0" step="0.01" value="<?= $valor ?>">
                            <label for="valor"><i class="bi bi-cash"></i> Valor:</label>
                        </div>



                        <div class="form-floating mb-3">
                          <select name="deb_cred" id="deb_cred" class="form-select">
                          <?= $deb_cred ?>
                          </select> 
                           <label for="senha"><i class="bi bi-currency-exchange"></i> Tipo de Pagamento</label>
                        </div>

                        <div class="form-floating mb-3">
                          <select name="status" id="status" class="form-select">
                          <?= $status ?>
                        </select> 
                        <label><i class="bi bi-question-square"></i> Status:</label>
                        </div>  
                       <br>
                        <button type="submit" class="w-100 btn btn-lg btn-primary"> <i class="bi bi-box-arrow-in-right"></i> Concluir</button>
                        <input type="hidden" name="acao" value="<?= $acao ?>">
                        <input type="hidden" name="id_financeiro" value="<?= $id ?>">
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>


</html>
</body>