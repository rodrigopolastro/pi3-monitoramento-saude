<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="js/color-modes.js"></script>

    <title>Sistema Acadêmico</title>
</head>

<body>
    <!-- Cabecalho pagina -->
    <session>
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
    </session>

    <div class="container">

        <div class="my-5">
            <div class="row justify-content-between">
                <div class="col-2">
                    <h3>
                        Lista de Medicamentos
                    </h3>
                </div>
                <div class="col-2 position-absolute end-0">
                    <a class="btn btn-primary" href="./alunos-inserir.php" role="button">
                        NOVO MEDICAMENTO
                    </a>
                </div>
            </div>

            <style>
    .table {
        width: 100%;
        max-width: 100%;
        margin: auto;
        table-layout: fixed;
    }

    </style>
<table class="table table-striped">
    <!-- restante do código da tabela -->
</table>

            <table class="table table-striped">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Tipo de medicamento</th>
                    <th>Quantidade de doses</th>
                    <th>Quantidade de doses tomadas</th>
                    <th>Início do tratamento</th>
                    <th>Ultima dose tomada</th>
                    <th>Fim do tratamento</th>
                </tr>                   
                <tr>
                    <td>1</td>
                    <td>Paracetamol</td>
                    <td>Medicamento para dor de cabeça</td>
                    <td>Referência</td>
                    <td>2</td>
                    <td>1</td>
                    <td>
                    <td>01/01/2022</td>
                    <td>01/02/2022</td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Amoxicilina</td>
                    <td>Medicamento para dor de garganta</td>
                    <td>Líquido</td>
                    <td>1</td>
                    <td>1</td>
                    <td>01/01/2022</td>
                    <td>01/02/2022</td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Paracetamol</td>
                    <td>Medicamento para dor de cabeça</td>
                    <td>Comprimido</td>
                    <td>2</td>
                    <td>1</td>
                    <td>01/01/2022</td>
                    <td>01/02/2022</td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Amoxicilina</td>
                    <td>Medicamento para dor de garganta</td>
                    <td>Líquido</td>
                    <td>1</td>
                    <td>4</td>
                    <td>01/01/2022</td>
                    <td>01/02/2022</td>
                    <td>
                    </td>
                </tr>
            </table>
            <!-- <a href="./alunos-inserir.php">Novo Aluno</a>*******MUNDANÇA DE CAMINHO***** -->
        </div>
    </div>
</body>

</html>