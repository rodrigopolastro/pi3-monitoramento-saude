<?php
require $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/fullPath.php';
require fullPath('views/components/header.php');
require fullPath('database/connection.php');
require fullPath('controllers/medicine-attributes.php');

$medicine_types    = controllerMedicineAttributes('select_medicine_types');
$frequency_types   = controllerMedicineAttributes('select_frequency_types');
$measurement_units = controllerMedicineAttributes('select_measurement_units');
?>

<div class="container">
    <div class="my-2">
        <div class="row justify-content-between">
            <div class="col-3">
                <h3>NOVO MEDICAMENTO</h3>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-3"></div>
            <div class="col-6 bg-light p-3">
                <form action="../../controllers/medicines.php" method="POST">
                    <input type="hidden" name="action" value="insert_medicine">
                    <div class="mb-3">
                        <label for="txtMedicineName" class="form-label">Nome do medicamento</label>
                        <input type="text" id="txtMedicineName" name="medicine_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtMedicineDescription" class="form-label">Descrição</label>
                        <input type="text" id="txtMedicineDescription" name="medicine_description" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="selMedicineType" class="form-label">Tipo de medicamento</label>
                        <select id="selMedicineType" name="medicine_type" class="form-control">
                            <?php foreach ($medicine_types as $medicine_type) : ?>
                                <option value='<?= $medicine_type['medicine_type_id'] ?>'>
                                    <?= ucfirst($medicine_type['portuguese_name']) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="selFrequencyType" class="form-label">Frequência de utilização</label>
                        <!-- <select id="selFrequencyType" name="medicine_type" class="form-control">
                            <?php foreach ($frequency_types as $frequency_type) : ?>
                                <option value='<?= $frequency_type['frequency_type_id'] ?>'>
                                    <?= ucfirst($frequency_type['portuguese_name']) ?>
                                </option>
                            <?php endforeach ?>
                        </select> -->
                        <select id="selFrequencyType" name="frequency_type" class="form-control">
                            <option value='1'>Diário</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="selMeasurementUnit" class="form-label">Unidade de medida</label>
                        <select id="selMeasurementUnit" name="measurement_unit" class="form-control">
                            <?php foreach ($measurement_units as $measurement_unit) : ?>
                                <option value='<?= $measurement_unit['measurement_unit_id'] ?>'>
                                    <?= $measurement_unit['portuguese_name'] == 'mL' ? 'mL' : ucfirst($measurement_unit['portuguese_name']) ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </form>
            </div>
            <button type="submit" class="btn btn-primary btn-block">ADICIONAR</button>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<?php
require '../components/footer.php';
?>