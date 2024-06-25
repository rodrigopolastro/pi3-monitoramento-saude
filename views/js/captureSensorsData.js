document
    .getElementById("captureBtn")
    .addEventListener("click", captureSensorsData);

function captureSensorsData() {
    let params = new URLSearchParams({
        action: 'insert_sensors_data',
        heart_rate: 7,
        body_temperature: 8,
        blood_oxygen: 9,
        blood_pressure: 10,
    });
    recordSensorsData(params);
}

async function recordSensorsData(params) {
    fetch("../../controllers/sensors-data.php", {
        method: "POST",
        mode: "same-origin",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: params,
    })
        .then((response) => response.json())
        .then((response) => {
            if(response.was_inserted){
                console.log('Dados capturados corretamente!');
            } else {
                console.log('Ocorreu um erro na captura dos dados.');
            }
        });
}
