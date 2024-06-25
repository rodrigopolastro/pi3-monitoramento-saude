const ctx = document.getElementById("sensorsCanvas").getContext("2d");
const sensorsChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [],
        datasets: [
            {
                label: "",
                data: [],
                backgroundColor: "blue",
                borderColor: "black",
                borderWidth: 1,
            },
        ],
    },
});

window.addEventListener("load", () => {
    let params = new URLSearchParams({
        action: "select_sensor_data",
        sensor_name: "heart_rate",
    });
    getSensorData(params);
});

const sensorsButtons = Array.from(
    document.getElementById("sensorsButtonsList").children
);
sensorsButtons.forEach((button) => {
    button.addEventListener("click", () => {
        let params = new URLSearchParams({
            action: "select_sensor_data",
            sensor_name: button.dataset.sensorName,
        });
        getSensorData(params);
    });
});

async function getSensorData(params) {
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
            let newLabels = [];
            let newData = [];

            data.records.forEach((sensor_record) => {
                newLabels.unshift(formatTime(sensor_record.timestamp));
                newData.unshift(sensor_record.sensors_data[data.sensorName]);
            });
            updateChart(newLabels, newData);
        });
}

function updateChart(newLabels, newData) {
    sensorsChart.data.datasets[0].data = newData;
    sensorsChart.data.labels = newLabels;
    sensorsChart.update();
}

function formatTime(timestamp) {
    let dateObject = new Date(timestamp);
    let hours =
        dateObject.getHours() < 10
            ? "0" + dateObject.getHours()
            : dateObject.getHours();
    let minutes =
        dateObject.getMinutes() < 10
            ? "0" + dateObject.getMinutes()
            : dateObject.getMinutes();
    let seconds =
        dateObject.getSeconds() < 10
            ? "0" + dateObject.getSeconds()
            : dateObject.getSeconds();

    let formattedTime = hours + ":" + minutes + ":" + seconds;
    return formattedTime;
}
