<!-- 
    Controller for the tables:
        - Medicine_Types
        - Frequency_Types,
        - Measurement_Units
    which are all simple tables to store 
    possible names for certain medicine attributes
-->

<?php
require fullPath('models/medicine-attributes.php');

if (isset($_POST['action'])) {
    controllerMedicineAttributes($_POST['action']);
}

function controllerMedicineAttributes($action)
{
    switch ($action) {
        case 'select_medicine_types':
            $medicine_types = getAllMedicineTypes();
            return $medicine_types;
            break;

        case 'select_frequency_types':
            $frequency_types = getAllFrequencyTypes();
            return $frequency_types;
            break;

        case 'select_measurement_units':
            $measurement_units = getAllMeasurementUnits();
            return $measurement_units;
            break;

        default:
            $error_message = 'Invalid action informed: action = ' . $action;
            return $error_message;
    }
}
