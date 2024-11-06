<!doctype html>
<html lang="en">

<head>
    <title>Finanças</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="[[base-url]]/views/templates/css/style.css">
</head>

<body class="bg-dark bg-opacity-10">

    <header class="container-fluid bg-white shadow-sm">
        <nav class="navbar navbar-expand-sm bg-white navbar-light">
            <div class="container">
                <a class="navbar-brand fs-3 text-primary fw-bold" href="#">Restaurante<span class="text-info">
                        MVC</span></a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="[[base-url]]/mesa-adm">Mesas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[base-url]]/usuario">Usuários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[base-url]]/sair">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<main>
    <section class="container mt-4">
        <div class="row">
            <div class="col-6">
                <span class="fs-4 fw-bold text"><i class="bi bi-grid-fill"></i> Formulário de finanças</span>
            </div>
            <div class="col-6 text-end">
                <a class='btn btn-sm btn-primary' href='<?= $baseUrl ?>/financas'><i class='bi bi-arrow-left'></i> VOLTAR</a>
            </div>
        </div>
    </section>
    <section class="container mt-3 ">
        <div class="row">
            <div class="col-md-6">

                <form action="<?= $baseUrl ?>/financas/atualizar" method="post">
                    <label for="data">Data:</label>
                    <input type="date" class="form-control" name="data" id="data" required><br>

                    
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control"></textarea>
                    
                    <label for="valor">Valor:</label>
                    <input type="number" class="form-control" name="valor" id="valor" required><br>
                    
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-select mb-4">
                        <?= $status ?>
                    </select>
                    
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <input type="hidden" id="acao" name="acao" value="<?= $acao ?>">
                </form>
            </div>
        </div>
    </section>
</main>
<footer class="container-fluid mt-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-6 my-3">
                    <small class="">&copy; 2024 | Restaurante MVC</small>
                </div>
                <div class="col-sm-6 my-3 text-end">
                    <small>Feito com <a target="_blank" href="https://getbootstrap.com/">Bootstrap</a></small>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>