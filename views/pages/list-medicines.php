<?php
require $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/fullPath.php';

require fullPath('views/components/header.php');
require fullPath('database/connection.php');
require fullPath('controllers/medicines.php');

// $medicines = controllerMedicines('select_medicines');
?>

<div class="container">
    <div class="my-5">
        <div class="row justify-content-between">
            <div class="col-2">
                <h3>
                    Lista de Medicamentos
                </h3>
            </div>
            <div class="col-2 position-absolute end-0">
                <a class="btn btn-primary" href="./new-medicine.php" role="button">
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
            <thead>
                <th>Nome</th>
                <th>Doses Totais</th>
                <th>Doses Tomadas</th>
            </thead>
            <!-- <tbody>
                <?php foreach($medicamentos as $medicamento): ?>
                    <tr>
                        <td><?= $medicamento['nome']; ?></td>
                        <td><?= $medicamento['doses_totais']; ?></td>
                        <td><?= $medicamento['doses_tomadas']; ?></td>
                        <td><button class="btn btn-primary">Visualizar Doses</button></td>
                    </tr>
                <?php endforeach?>
            </tbody> -->
        </table>
        <!-- <a href="./alunos-inserir.php">Novo Aluno</a>*******MUNDANÇA DE CAMINHO***** -->
    </div>
</div>
<script src="../requests/medicamentos-listar.js"></script>
<?php
require '../components/footer.php';
?>