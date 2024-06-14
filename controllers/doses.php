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
            // echo $medicine_id;
            // header("Location: /pi-monitoramento-saude/?a=" . $medicine_id);
            $doses = getDosesFromMedicineId($medicine_id);

            // echo json_encode($_POST['medicine_id']);
            echo json_encode($doses);
            break;
        
        case 'insert_medicine_doses':
            $date_time = DateTimeImmutable::createFromFormat(
                'Y-m-d', 
                $_GET['treatment_start_date'],
                new DateTimeZone('America/Sao_Paulo')
            );
            $total_usage_days = $_GET['total_usage_days'];
            for ($day_increment = 0; $day_increment < $total_usage_days; $day_increment++) {
                $increment_string = 'P'. $day_increment+1 . 'D';
                $dose_due_date = $date_time->add(new DateInterval($increment_string))->format('Y-m-d');
                for ($i = 1; $i <= $_GET['doses_per_day']; $i++) {
                    $dose = [
                        'medicine_id' => $_GET['medicine_id'],
                        'due_date' =>    $dose_due_date,
                        'due_time' =>    $_GET['dose_time_' . $i],
                        'taken_date' =>  NULL,
                        'taken_time' =>  NULL,
                        'was_taken' =>   FALSE,
                    ];
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
