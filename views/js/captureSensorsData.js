function getRandomInt(min, max) {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled);
}

const INTERVAL_IN_SECONDS = 2;
const INTERVAL_IN_MS = INTERVAL_IN_SECONDS * 1000;

var captureIntervalId;
const captureSwitch = document.getElementById("captureSwitch");
captureSwitch.addEventListener("change", () => {
    if (captureSwitch.checked) {
        console.log("Captura de dados ligada");
        captureIntervalId = setInterval(captureSensorsData, INTERVAL_IN_MS);
    } else {
        console.log("Captura de dados desligada");
        clearInterval(captureIntervalId);
    }
});

document
    .getElementById("captureBtn")
    .addEventListener("click", captureSensorsData);

function captureSensorsData() {
    let params = new URLSearchParams({
        action: "insert_sensors_data",
        heart_rate: getRandomInt(40, 120),
        body_temperature: getRandomInt(35, 39),
        blood_oxygen: getRandomInt(85, 100),
        blood_pressure: getRandomInt(80, 130),
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
            if (response.was_inserted) {
                console.log("Dados capturados corretamente!: \n" + params);
                displaySensorsRecord(response.inserted_record, true);

                // Update list with new data
                let params2 = new URLSearchParams({
                    action: "select_sensor_data",
                    sensor_name: "heart_rate",
                });
                getSensorData(params2);
            } else {
                console.log("Ocorreu um erro na captura dos dados.");
            }
        });
}
