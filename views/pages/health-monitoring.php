<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/full-path.php';
require_once fullPath('scripts/session-authentication.php');
require_once fullPath('views/components/header.php');

?>

<div class="container">
    <div class="mt-4">
        <div class="row">
            <div class="col-md-6">
                <!-- Adicione o canvas para o gráfico -->
                <canvas id="graficoBatimentos" width="400" height="180"></canvas>
            </div>
            <div class="col-md-6">
                <!-- Adicione o canvas para o gráfico -->
                <canvas id="graficooxigenio" width="400" height="180"></canvas>
            </div>
            <div class="col-md-6">
                <!-- Adicione o canvas para o gráfico -->
                <canvas id="graficopressao" width="400" height="180"></canvas>
            </div>
            <div class="col-md-6">
                <!-- Adicione o canvas para o gráfico -->
                <canvas id="graficoeletro" width="400" height="180"></canvas>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <div class="w-25 p-3 border-2">
            <div class="row">
                <div class="w-auto mx-auto p-3 border-2">
                    <h3 class="text-center">19/06 - 13:35</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Pressão Sanguínea</h5>
                                    <p class="card-text">120/80</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Temperatura Corporal</h5>
                                    <p class="card-text">36.5°C</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">O2 no Sangue</h5>
                                    <p class="card-text">98%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Número de Eletrocardiograma</h5>
                                    <p class="card-text">65</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-25 p-3 border-2">
            <div class="row">
                <div class="w-auto mx-auto p-3 border-2">
                    <h3 class="text-center">21/06 - 20:06</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Pressão Sanguínea</h5>
                                    <p class="card-text">120/80</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Temperatura Corporal</h5>
                                    <p class="card-text">36.5°C</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">O2 no Sangue</h5>
                                    <p class="card-text">98%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Número de Eletrocardiograma</h5>
                                    <p class="card-text">65</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-25 p-3 border-2">
            <div class="row">
                <div class="w-auto mx-auto p-3 border-2">
                    <h3 class="text-center">22/06 - 18:55</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Pressão Sanguínea</h5>
                                    <p class="card-text">120/80</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Temperatura Corporal</h5>
                                    <p class="card-text">36.5°C</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">O2 no Sangue</h5>
                                    <p class="card-text">98%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Número de Eletrocardiograma</h5>
                                    <p class="card-text">65</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-25 p-3 border-2">
            <div class="row">
                <div class="w-auto mx-auto p-3 border-2">
                    <h3 class="text-center">25/06 - 13:35</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Pressão Sanguínea</h5>
                                    <p class="card-text">120/80</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Temperatura Corporal</h5>
                                    <p class="card-text">36.5°C</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">O2 no Sangue</h5>
                                    <p class="card-text">98%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Número de Eletrocardiograma</h5>
                                    <p class="card-text">65</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Biblioteca Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('graficoBatimentos').getContext('2d');
        var data = {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
            datasets: [{
                label: 'Média de Batimentos',
                data: [60, 70, 80, 75, 85, 90], // Substitua pelos seus dados reais
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        };
        var graficoBatimentos = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('graficooxigenio').getContext('2d');
        var data = {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
            datasets: [{
                label: 'Média de oxigenio',
                data: [90, 150, 280, 100, 800, 70], // Substitua pelos seus dados reais
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        };
        var graficoBatimentos = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('graficopressao').getContext('2d');
        var data = {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
            datasets: [{
                label: 'Média de pressão Sanguínea',
                data: [90, 150, 280, 100, 800, 70], // Substitua pelos seus dados reais
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        };
        var graficoBatimentos = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('graficoeletro').getContext('2d');
        var data = {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
            datasets: [{
                label: 'Média de pressão Sanguínea',
                data: [7, 12, 12, 11, 15, 10], // Substitua pelos seus dados reais
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        };
        var graficoBatimentos = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>

<?php
require_once fullPath('views/components/footer.php');
?>