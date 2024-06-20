var isMedicineDosesQuery;

window.addEventListener("load", () => {
    let params = new URLSearchParams({
        action: "select_all_doses",
    });
    isMedicineDosesQuery = false;
    listDoses(params);
});

document
    .getElementById("btnShowUpcomingDoses")
    .addEventListener("click", () => {
        document.getElementById("divDosesCounter").classList.add("d-none");

        let params = new URLSearchParams({
            action: "select_all_doses",
        });
        isMedicineDosesQuery = false;
        listDoses(params);
    });

document.getElementsByName("btnViewDoses").forEach((viewDosesBtn) => {
    viewDosesBtn.addEventListener("click", () => {
        let params = new URLSearchParams({
            action: "select_medicine_doses",
            medicine_id: viewDosesBtn.dataset.medicineId,
        });
        isMedicineDosesQuery = true;
        listDoses(params);
    });
});

let nextDosesList = document.getElementById("nextDosesList");
let takenDosesList = document.getElementById("takenDosesList");
async function listDoses(params) {
    try {
        fetch("../../controllers/doses.php", {
            method: "POST",
            mode: "same-origin",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: params,
        })
            .then((response) => response.json())
            .then((doses) => {
                console.log(doses);

                nextDosesList.innerHTML = "";
                doses.not_taken_doses.forEach((dose) =>
                    displayDoseDiv(nextDosesList, dose)
                );

                if (doses.taken_doses) {
                    document
                        .getElementById("takenDosesDiv")
                        .classList.remove("d-none");
                    takenDosesList.innerHTML = "";
                    doses.taken_doses.forEach((dose) => {
                        displayDoseDiv(takenDosesList, dose);
                    });
                } else {
                    document
                        .getElementById("takenDosesDiv")
                        .classList.add("d-none");
                }
            });
    } catch (error) {
        console.error("Error in Request:", error);
    }
}

function displayDoseDiv(parentElement, dose) {
    let doseHtml = `
        <div class="" data-medicine-id="${dose.medicine_id}" data-dose-id="${
        dose.dose_id
    }">
            ${
                dose.was_taken
                    ? `<button onclick="setDoseNotTaken(${dose.dose_id})" class="btn btn-danger">Desmarcar</button>`
                    : `<button onclick="takeDose(${dose.dose_id})" class="btn btn-success">Tomar Dose</button>`
            }
            <p>Marcada para: ${dose.due_date} - ${dose.due_time}</p>
            ${dose.was_taken ? `<p>Tomada em: ${dose.taken_date} - ${dose.taken_time}</p>` : ''}
            <h6>${dose.medicine_name}: ${dose.quantity_per_dose} ${
        dose.measurement_unit
    }</h6>
        </div>
    `;

    parentElement.innerHTML += doseHtml;
}

async function takeDose(doseId) {
    try {
        fetch("../../controllers/doses.php", {
            method: "POST",
            mode: "same-origin",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: new URLSearchParams({
                action: "take_dose",
                dose_id: doseId,
            }),
        })
            .then((response) => response.json())
            .then((response) => {
                if (response.success) {
                    if (isMedicineDosesQuery) {
                        let doseDivQuery = "[data-dose-id='" + doseId + "']";
                        let medicineId =
                            document.querySelector(doseDivQuery).dataset
                                .medicineId;
                        var params = new URLSearchParams({
                            action: "select_medicine_doses",
                            medicine_id: medicineId,
                        });
                        listDoses(params);
                        let params2 = new URLSearchParams({
                            action: "count_medicine_doses",
                            medicine_id: medicineId,
                        });
                        displayDosesNumber(params2);
                    } else {
                        let params = new URLSearchParams({
                            action: "select_all_doses",
                        });
                        listDoses(params);
                    }
                }
            });
    } catch (error) {
        console.error("Error in Request:", error);
    }
}

async function setDoseNotTaken(doseId) {
    try {
        fetch("../../controllers/doses.php", {
            method: "POST",
            mode: "same-origin",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: new URLSearchParams({
                action: "set_dose_not_taken",
                dose_id: doseId,
            }),
        })
            .then((response) => response.json())
            .then((response) => {
                if (response.success) {
                    if (isMedicineDosesQuery) {
                        let doseDivQuery = "[data-dose-id='" + doseId + "']";
                        let medicineId =
                            document.querySelector(doseDivQuery).dataset
                                .medicineId;
                        var params = new URLSearchParams({
                            action: "select_medicine_doses",
                            medicine_id: medicineId,
                        });
                        listDoses(params);
                        let params2 = new URLSearchParams({
                            action: "count_medicine_doses",
                            medicine_id: medicineId,
                        });
                        displayDosesNumber(params2);
                    } else {
                        let params = new URLSearchParams({
                            action: "select_all_doses",
                        });
                        listDoses(params);
                    }
                }
            });
    } catch (error) {
        console.error("Error in Request:", error);
    }
}


