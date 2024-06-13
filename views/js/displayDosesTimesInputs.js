const HOURS_IN_A_DAY = 24;
const HOUR_IN_MILISECONDS = 60 * 60 * 1000;
let selectedHoursInterval, dosesTimesInputs, numberOfInputsToDisplay;

window.addEventListener("load", displayDosesTimesInputs);
function displayDosesTimesInputs() {
    let dosesTimesDiv = document.getElementById("dosesTimesDiv");
    dosesTimesInputs = Array.from(dosesTimesDiv.querySelectorAll("input"));
    dosesTimesInputs.shift(); //First input is fixed
    let doses_hours_interval_inputs = document.getElementsByName(
        "doses_hours_interval"
    );

    doses_hours_interval_inputs.forEach((radioInput) => {
        radioInput.addEventListener("change", () => {
            selectedHoursInterval = parseInt(radioInput.value);
            numberOfInputsToDisplay = HOURS_IN_A_DAY / selectedHoursInterval;

            hideAllInputs(dosesTimesInputs);
            for (let i = 0; i < numberOfInputsToDisplay - 1; i++) {
                dosesTimesInputs[i].hidden = false;
                dosesTimesInputs[i].disabled = false;
            }
        });
    });
}

function hideAllInputs(dosesTimesInputs) {
    dosesTimesInputs.forEach((input) => {
        input.value = "";
        input.hidden = true;
        input.disabled = true;
    });
}

let firstDoseTime = document.getElementById("firstDoseTime");
firstDoseTime.addEventListener("change", updateDosesTimes);
function updateDosesTimes() {
    let firstDoseHours = parseInt(firstDoseTime.value.split(":")[0]);
    let firstDoseMinutes = parseInt(firstDoseTime.value.split(":")[1]);
    let dateTime = new Date(0);
    dateTime.setHours(firstDoseHours);
    dateTime.setMinutes(firstDoseMinutes);
    for (let i = 1; i <= numberOfInputsToDisplay - 1; i++) {
        let hoursToAdd = selectedHoursInterval * i;
        let milisecondsToAdd = hoursToAdd * HOUR_IN_MILISECONDS;
        let nextDateTime = new Date(dateTime.getTime() + milisecondsToAdd);

        let hours = nextDateTime.getHours();
        let finalHours = hours < 10 ? "0" + hours : hours;
        let minutes = nextDateTime.getMinutes();
        let finalMinutes = minutes < 10 ? "0" + minutes : minutes;
        dosesTimesInputs[i - 1].value = finalHours + ":" + finalMinutes;
    }
}
