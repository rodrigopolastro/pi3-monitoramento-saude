<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/fullPath.php';
require_once fullPath('models/medicines.php');

if (isset($_POST['action'])) {
    controllerMedicines($_POST['action']);
}

function controllerMedicines($action)
{
    switch ($action) {
        case 'select_medicines':
            $medicines = getAllMedicines();
            return $medicines;
            break;

        case 'insert_medicine':
            $medicine = [
                'medicine_type_id' => $_POST['medicine_type_id'],
                'frequency_type_id' => $_POST['frequency_type_id'],
                'measurement_unit_id' => $_POST['measurement_unit_id'],
                'medicine_name' => $_POST['medicine_name'],
                'medicine_description' => $_POST['medicine_description'],
                'doses_per_day' => $_POST['doses_per_day'],
                'quantity_per_dose' => $_POST['quantity_per_dose'],
                'treatment_start_date' => $_POST['treatment_start_date'],
                'total_usage_days' => $_POST['total_usage_days'],
            ];
            createMedicine($medicine);

            header('Location: /pi3-monitoramento-saude/views/pages/list-medicines.php');
            exit();
            break;

        default:
            $error_message = 'Invalid action informed: action = ' . $action;
            return $error_message;
    }
}
