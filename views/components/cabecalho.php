<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /> -->
    <title>Sistema Acadêmico</title>
</head> 

<body>
    <header class="d-block p-5 text-bg-dark">
        <div class="container">
            <div class="d-flex ">
                <!-- Titulo página -->
                <div class="col-sm-6">
                    <h3>Sistema de gerenciamento de saúde</h3>
                </div>

                <!-- Navbar -->
                <div class="col-sm-4">
                    <ul class="nav me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="./alunos-listar.php" class="nav-link px-3 text-white">Medicamentos</a></li><!--*******MUNDANÇA DE CAMINHO*****-->
                        <li><a href="../turmas/turmas-listar.php" class="nav-link px-3 text-white">Histórico</a></li><!--*******MUNDANÇA DE CAMINHO*****-->
                        <li><a href="#" class="nav-link px-3 text-white">Batimentos</a></li>
                    </ul>
                </div>

                <!-- Botao login -->
                <div class="d-grid gap-2 col-1 mx-auto">
                    <a href="../usuario-logout.php" type="button" class="btn btn-light">
                        SAIR
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main class="min-vh-100">