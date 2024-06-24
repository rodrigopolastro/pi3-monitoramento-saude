<?php

require_once fullPath('database/mysql-connection.php');

function getAllMedicines()
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT 
            md.medicine_id,
            md.medicine_name,
            md.medicine_description,
            md.doses_per_day,
            md.quantity_per_dose,
            md.treatment_start_date,
            mt.portuguese_name medicine_type,
            ft.portuguese_name frequency_type,
            mu.portuguese_name measurement_unit
        FROM medicines md 
        INNER JOIN medicine_types mt  on mt.medicine_type_id = md.medicine_type_id
        INNER JOIN frequency_types ft on ft.frequency_type_id = md.frequency_type_id
        INNER JOIN measurement_units mu on mu.measurement_unit_id = md.measurement_unit_id"
    );

    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function createMedicine($medicine)
{
    global $connection;
    $statement = $connection->prepare(
        "INSERT INTO medicines (
            user_id,
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
            :user_id,
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

    $statement->bindValue(':user_id', $medicine['user_id']);
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

    return $connection->lastInsertId();
}
