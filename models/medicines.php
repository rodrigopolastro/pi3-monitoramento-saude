<?php

require_once fullPath('database/connection.php');


function getAllMedicines()
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT
            id_medicamento,
            nome,
            descricao,
            doses_totais,
            doses_tomadas,
            inicio_tratamento,
            fim_tratamento
        FROM medicamentos"
    );

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function createMedicine($medicine)
{
    global $connection;
    $statement = $connection->prepare(
        "INSERT INTO medicines (
            medicine_type_id,
            frequency_type_id,
            measurement_unit_id,
            medicine_name,
            medicine_description,
            doses_per_day,
            quantity_per_dose,
            treatment_start_date,
            total_usage_days
        ) VALUES (
            :medicine_type_id,
            :frequency_type_id,
            :measurement_unit_id,
            :medicine_name,
            :medicine_description,
            :doses_per_day,
            :quantity_per_dose,
            :treatment_start_date,
            :total_usage_days
        )"
    );

    $statement->bindValue(':medicine_type_id', $medicine['medicine_type_id']);
    $statement->bindValue(':frequency_type_id', $medicine['frequency_type_id']);
    $statement->bindValue(':measurement_unit_id', $medicine['measurement_unit_id']);
    $statement->bindValue(':medicine_name', $medicine['medicine_name']);
    $statement->bindValue(':medicine_description', $medicine['medicine_description']);
    $statement->bindValue(':doses_per_day', $medicine['doses_per_day']);
    $statement->bindValue(':quantity_per_dose', $medicine['quantity_per_dose']);
    $statement->bindValue(':treatment_start_date', $medicine['treatment_start_date']);
    $statement->bindValue(':total_usage_days', $medicine['total_usage_days']);

    $statement->execute();
}
