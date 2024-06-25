<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/full-path.php';
require_once fullPath('scripts/session-authentication.php');
require_once fullPath('views/components/header.php');
require_once fullPath('controllers/sensors-data.php');

var_dump($_SESSION);
?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="form-check form-switch">
                <input id="captureSwitch" class="form-check-input" type="checkbox" role="switch">
                <label for="captureSwitch" class="form-check-label">Captura Automática de Dados</label>
            </div>
            <button id="captureBtn">Capturar Dados Agora</button>
            <div id="sensorsRecordsList">
                <!-- Loaded dinamically with javascript -->
            </div>
        </div>
        <div class="col-6">
            <div id="sensorsButtonsList" class="d-flex">
                <button type="button" data-sensor-name="heart_rate" class="btn btn-outline-danger">Batimentos por Minuto</button>
                <button type="button" data-sensor-name="body_temperature" class="btn btn-outline-warning">Temperatura Corporal</button>
                <button type="button" data-sensor-name="blood_oxygen" class="btn btn-outline-primary">Oxigênio no Sangue</button>
                <button type="button" data-sensor-name="blood_pressure" class="btn btn-outline-success">Pressão Sanguínea</button>
            </div>
            <canvas id="sensorsCanvas" width="400" height="180"></canvas>
        </div>
    </div>
</div>

<!-- Biblioteca Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<script src="../js/sensorsGraph.js"></script>
<script src="../js/displaySensorsRecord.js"></script>
<script src="../js/listSensorsRecords.js"></script>
<script src="../js/captureSensorsData.js"></script>

<?php
require_once fullPath('views/components/footer.php');
?>