<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/fullPath.php';
require_once fullPath('views/components/header.php');
require_once fullPath('controllers/medicines.php');

$medicines = controllerMedicines('select_medicines');
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
                <th>Descrição</th>
                <th>Doses Tomadas</th>
                <th>Início do Tratamento</th>
                <th>Frequência</th>
                <th>Doses por dia</th>
                <th>Porção da Dose</th> <!-- Quantity + Measurement Unit -->
            </thead>
            <tbody>
                <?php foreach($medicines as $medicine): ?>
                    <tr>
                        <td><?= $medicine['medicine_name'] ?></td>
                        <td><?= $medicine['medicine_description'] ?></td>
                        <td> doses tomadas / doses totais </td>
                        <td><?= $medicine['treatment_start_date'] ?></td>
                        <td><?= ucfirst($medicine['frequency_type']) ?></td>
                        <td><?= $medicine['doses_per_day'] ?> </td>
                        <td><?= $medicine['quantity_per_dose'] . ' ' . ucfirst($medicine['measurement_unit']) ?></td>
                        <td><button class="btn btn-primary">Visualizar Doses</button></td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <!-- <a href="./alunos-inserir.php">Novo Aluno</a>*******MUNDANÇA DE CAMINHO***** -->
    </div>
</div>
<script src="../requests/medicamentos-listar.js"></script>
<?php
require_once '../components/footer.php';
?>