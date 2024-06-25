<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/full-path.php';
require_once fullPath('scripts/session-authentication.php');
require_once fullPath('views/components/header.php');
require_once fullPath('controllers/sensors-data.php');

?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="form-check form-switch">
                <input id="captureSwitch" class="form-check-input" type="checkbox" role="switch">
                <label for="captureSwitch" class="form-check-label">Captura Automática de Dados</label>
            </div>
            <button id="captureBtn">Capturar Dados Agora</button>
            <div>
                <div>
                    <p>sensor 1</p>
                </div>
                <div>
                    <p>sensor 2</p>
                </div>
                <div>
                    <p>sensor 3</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="d-flex">
                <div>Batimentos por Minuto</div>
                <div>Temperatura Corporal</div>
                <div>Oxigênio no Sangue</div>
                <div>Pressão Sanguínea</div>
            </div>
            <canvas id="sensorsGraph" width="400" height="180"></canvas>
        </div>
    </div>
    <button id="updateBtn">Update</button>
</div>

<!-- Biblioteca Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src="../js/sensorsGraph.js"></script>
<script src="../js/captureSensorsData.js"></script>

<?php
require_once fullPath('views/components/footer.php');
?>