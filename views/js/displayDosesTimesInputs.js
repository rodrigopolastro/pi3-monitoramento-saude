const HOURS_IN_A_DAY = 24;
let selectdHoursInterval;

window.addEventListener("load", displayDosesTimesInputs);
function displayDosesTimesInputs() {
    let dosesTimesDiv = document.getElementById("dosesTimesDiv");
    let dosesTimesInputs = dosesTimesDiv.querySelectorAll("input");
    let doses_hours_interval_inputs = document.getElementsByName(
        "doses_hours_interval"
    );

    doses_hours_interval_inputs.forEach((radioInput) => {
        radioInput.addEventListener("change", () => {
            selectedHoursInterval = parseInt(radioInput.value);
            let numberOfInputsToDisplay =
                HOURS_IN_A_DAY / selectedHoursInterval;

            hideAllInputs(dosesTimesInputs);
            for (let i = 0; i < numberOfInputsToDisplay; i++) {
                dosesTimesInputs[i].hidden = false;
                dosesTimesInputs[i].disabled = false;
            }
        });
    });
}

function hideAllInputs(dosesTimesInputs) {
    dosesTimesInputs.forEach((input) => {
        input.hidden = true;
        input.disabled = true;
    });
}
