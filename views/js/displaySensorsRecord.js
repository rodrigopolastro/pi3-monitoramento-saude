function displaySensorsRecord(sensorRecord, insertStart = false) {
    // let time = new Date(sensorRecord.timestamp)
    let sensorRecordDiv = `
        <div class="bg-light rounded-4 p-3 mb-3">
            <p> Captura Realizada às <strong>${formatTime(sensorRecord.timestamp)}</strong></p>
            <div>
                <div class="row">
                    <p class="col text-danger"> Batimentos Cardíacos: ${sensorRecord.sensors_data.heart_rate} </p>
                    <p class="col text-warning"> Temperatura Corporal: ${sensorRecord.sensors_data.body_temperature} </p>
                </div>
                <div class="row text">
                    <p class="col text-primary"> Oxigênio no Sangue: ${sensorRecord.sensors_data.blood_oxygen} </p>
                    <p class="col text-success"> Pressão Sanguínea: ${sensorRecord.sensors_data.blood_pressure} </p>
                </div>
            </div>
        </div>
    `;

    const sensorsRecordsList = document.getElementById("sensorsRecordsList");
    if (insertStart) {
        sensorsRecordsList.innerHTML =
            sensorRecordDiv + sensorsRecordsList.innerHTML;
    } else {
        sensorsRecordsList.innerHTML =
            sensorsRecordsList.innerHTML + sensorRecordDiv;
    }
}
