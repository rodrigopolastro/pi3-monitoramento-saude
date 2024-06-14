window.addEventListener("load", () => {
    let params = new URLSearchParams({
        action: "select_all_doses",
    });
    listDoses(params);
});

const btnShowUpcomingDoses = document.getElementById("btnShowUpcomingDoses");
btnShowUpcomingDoses.addEventListener("click", () => {
    let params = new URLSearchParams({
        action: "select_all_doses",
    });
    listDoses(params);
});

const viewDosesButtonsList = document.getElementsByName("btnViewDoses");
viewDosesButtonsList.forEach((viewDosesBtn) => {
    viewDosesBtn.addEventListener("click", () => {
        let params = new URLSearchParams({
            action: "select_medicine_doses",
            medicine_id: viewDosesBtn.dataset.medicineId,
        });
        listDoses(params);
    });
});

const dosesList = document.getElementById("divDosesList");
async function listDoses(params) {
    try {
        fetch("../../controllers/doses.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: params,
        })
            .then((response) => response.json())
            .then((doses) => {
                console.log(doses);
                dosesList.innerHTML = "";
                doses.forEach((dose) => displayDoseDiv(dose));
            });
    } catch (error) {
        console.error("Error in Request:", error);
    }
}

// TO DO: Create separate layouts for displaying 
// all the doses and the doses of a medicine
function displayDoseDiv(dose) {
    let doseHtml = `
        <div class="d-flex">
            <p>${dose.due_date} - ${dose.due_time}</p>
            <h6>${dose.medicine_name}: ${dose.quantity_per_dose} ${dose.portuguese_name}</h6>
        </div>
    `;

    dosesList.innerHTML += doseHtml;
}
