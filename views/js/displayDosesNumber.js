document.getElementsByName("btnViewDoses").forEach((viewDosesBtn) => {
    viewDosesBtn.addEventListener("click", () => {
        let params = new URLSearchParams({
            action: "count_medicine_doses",
            medicine_id: viewDosesBtn.dataset.medicineId,
        });
        displayDosesNumber(params);
    });
});

async function displayDosesNumber(params) {
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
            .then((dosesNumber) => {
                document
                    .getElementById("divDosesCounter")
                    .classList.remove("d-none");

                document.getElementById("takenDosesCounter").innerHTML =
                    dosesNumber.taken_doses;

                document.getElementById("totalDosesCounter").innerHTML =
                    dosesNumber.total_doses;
            });
    } catch (error) {
        console.error("Error in Request:", error);
    }
}
