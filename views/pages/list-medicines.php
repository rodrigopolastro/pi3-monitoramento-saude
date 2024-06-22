<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/full-path.php';
require_once fullPath('scripts/session-authentication.php');
require_once fullPath('views/components/header.php');
require_once fullPath('controllers/medicines.php');

$medicines = controllerMedicines('select_medicines');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-8">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>
                        Lista de Medicamentos
                    </h3>
                </div>
                <div class="">
                    <a class="btn btn-primary" href="./new-medicine.php">
                        NOVO MEDICAMENTO
                    </a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Início do Tratamento</th>
                    <th>Frequência</th>
                    <th>Doses por dia</th>
                    <th>Porção da Dose</th> <!-- Quantity + Measurement Unit -->
                </thead>
                <tbody>
                    <?php foreach ($medicines as $medicine) : ?>
                        <tr>
                            <td><?= $medicine['medicine_name'] ?></td>
                            <td><?= $medicine['medicine_description'] ?></td>
                            <td><?= $medicine['treatment_start_date'] ?></td>
                            <td><?= ucfirst($medicine['frequency_type']) ?></td>
                            <td><?= $medicine['doses_per_day'] ?> </td>
                            <td><?= $medicine['quantity_per_dose'] . ' ' . ucfirst($medicine['measurement_unit']) ?></td>
                            <td>
                                <button data-medicine-id="<?= $medicine['medicine_id'] ?>" name="btnViewDoses" class="btn btn-primary">
                                    Visualizar Doses
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <h3>Doses</h3>
            <div id="divDosesCounter" class="d-none">
                <p id="dosesCounter">
                    <span id="takenDosesCounter"></span>
                    /
                    <span id="totalDosesCounter"></span>
                    Doses Tomadas
                </p>
            </div>
            <button id="btnShowUpcomingDoses" class="btn btn-primary">Visualizar Próximas Doses</button>
            <div>
                <!-- The doses lists are generated dinamically by javascript -->
                <div id="nextDosesDiv">
                    <h4>Próximas Doses</h4>
                    <div id="nextDosesList"></div>
                </div>
                <div id="takenDosesDiv">
                    <h4>Doses Tomadas</h4>
                    <div id="takenDosesList"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/displayDosesNumber.js"></script>
<script src="../js/listDoses.js"></script>

<?php
require_once '../components/footer.php';
?>