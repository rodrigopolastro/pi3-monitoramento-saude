<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
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
                        <li><a href="./list-medicines.php" class="nav-link px-3 text-white">Medicamentos</a></li><!--*******MUNDANÇA DE CAMINHO*****-->
                        <li><a href="./health-data.php" class="nav-link px-3 text-white">Histórico</a></li><!--*******MUNDANÇA DE CAMINHO*****-->
                        <li><a href="#" class="nav-link px-3 text-white">Batimentos</a></li>
                    </ul>
                </div>

                <!-- Botao logout -->
                <div class="d-grid gap-2 col-1 mx-auto">
                    <form method="POST" action="../../controllers/users.php">
                        <input type="hidden" name="action" value="logout">
                        <input type="submit" value="Sair" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main class="min-vh-100">