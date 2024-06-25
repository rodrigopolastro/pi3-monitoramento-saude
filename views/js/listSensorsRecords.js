window.addEventListener("load", () => {
    let params = new URLSearchParams({
        action: "select_sensors_data",
    });
    listSensorsRecords(params);
});

async function listSensorsRecords(params) {
    try {
        fetch("../../controllers/sensors-data.php", {
            method: "POST",
            mode: "same-origin",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: params,
        })
            .then((response) => response.json())
            .then((data) => {
                data.forEach((sensors_record) =>
                    displaySensorsRecord(sensors_record)
                );
            });
    } catch (error) {
        console.error("Error in Request:", error);
    }
}

function displaySensorsRecord(sensorRecord) {
    console.log(sensorRecord);
    let sensorRecordDiv = `
        <div class="">
            <p> ${sensorRecord.timestamp} </p>
            <p> Batimentos Cardíacos: ${sensorRecord.sensors_data.heart_rate} </p>
            <p> Temperatura Corporal: ${sensorRecord.sensors_data.body_temperature} </p>
            <p> Oxigênio no Sangue: ${sensorRecord.sensors_data.blood_oxygen} </p>
            <p> Pressão Sanguínea: ${sensorRecord.sensors_data.blood_pressure} </p>
        </div>
    `;

    const sensorsRecordsList = document.getElementById("sensorsRecordsList");
    sensorsRecordsList.innerHTML += sensorRecordDiv;
}
