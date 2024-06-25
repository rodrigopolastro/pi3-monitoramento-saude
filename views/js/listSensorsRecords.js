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
