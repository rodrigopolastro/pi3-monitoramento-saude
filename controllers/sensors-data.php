<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/pi3-monitoramento-saude/helpers/full-path.php';
require_once fullPath('models/sensors-data.php');

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['action'])) {
    controllerSensorsData($_POST['action']);
}

function controllerSensorsData($action)
{
    switch ($action) {
        case 'select_sensors_data':
            $sensors_records = getSensorsRecords($_SESSION['user_id']);
            echo json_encode($sensors_records);
            break;

        case 'insert_sensors_data':
            $user_id = $_SESSION['user_id'];
            
            $date = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
            $timestamp = $date->format('Y-m-d H:i:s');

            $sensors = [
                'heart_rate' => $_POST['heart_rate'],
                'body_temperature' => $_POST['body_temperature'],
                'blood_oxygen' => $_POST['blood_oxygen'],
                'blood_pressure' => $_POST['blood_pressure'],
            ];

            try {
                $inserted_record = recordSensorsData($user_id, $timestamp, $sensors);
                echo json_encode([
                    'was_inserted' => true,
                    'inserted_record' => $inserted_record
                ]);

            } catch (Exception $e) {
                echo json_encode([
                    'was_inserted' => false,
                    'message' => $e->getMessage(),
                ]);
            }
            break;

        default:
            $error_message = 'Invalid action informed: action = ' . $action;
            return $error_message;
    }
}
