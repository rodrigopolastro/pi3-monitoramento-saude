<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/fullPath.php';
require_once fullPath('models/doses.php');

if (isset($_GET['action'])) {
    controllerDoses($_GET['action']);
} else if (isset($_POST['action'])) {
    controllerDoses($_POST['action']);
}

function controllerDoses($action)
{
    switch ($action) {
        case 'select_all_doses':
            $doses = getAllDoses();
            echo json_encode($doses);
            break;

        case 'select_medicine_doses':
            $medicine_id = $_POST['medicine_id'];
            $doses = getDosesFromMedicineId($medicine_id);
            echo json_encode($doses);
            break;

        case 'insert_medicine_doses':
            $initial_date_time = DateTimeImmutable::createFromFormat(
                'Y-m-d',
                $_GET['treatment_start_date'],
                new DateTimeZone('America/Sao_Paulo')
            );
            $total_usage_days = $_GET['total_usage_days'];

            // what we call "today's midnight" actually belongs to "tomorrow"
            $days_increment = $_GET['dose_time_1'] == '00:00' ? 1 : 0; 

            for ($days_increment = 0; $days_increment < $total_usage_days; $days_increment++) {
                $increment_string = 'P' . $days_increment . 'D';
                $dose_due_date = $initial_date_time->add(new DateInterval($increment_string))->format('Y-m-d');
                for ($dose_time_index = 1; $dose_time_index <= $_GET['doses_per_day']; $dose_time_index++) {
                    $dose_due_time = $_GET['dose_time_' . $dose_time_index];

                    // increase one day if the dose time has overflowed
                    if ($dose_due_time < $_GET['dose_time_1']) {
                        $dose_due_date++;
                    }

                    $dose = [
                        'medicine_id' => $_GET['medicine_id'],
                        'due_date' =>    $dose_due_date,
                        'due_time' =>    $dose_due_time,
                    ];
                    foreach ($dose as $key => $value) {
                        if (empty($value)) {
                            $dose[$key] = NULL;
                        }
                    }
                    $dose['taken_date'] = NULL;
                    $dose['taken_time'] = NULL;
                    $dose['was_taken'] = FALSE;

                    createDose($dose);
                }
            }
            header('Location: /pi3-monitoramento-saude/views/pages/list-medicines.php');
            exit();
            break;

        default:
            $error_message = 'Invalid action informed: action = ' . $action;
            return $error_message;
    }
}
