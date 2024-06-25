function displaySensorsRecord(sensorRecord, insertStart=false) {
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
    if(insertStart){
        sensorsRecordsList.innerHTML = sensorRecordDiv + sensorsRecordsList.innerHTML;
    } else {
        sensorsRecordsList.innerHTML = sensorsRecordsList.innerHTML + sensorRecordDiv;
    }
}