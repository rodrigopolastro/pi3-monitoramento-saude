<?php

require_once fullPath('database/connection.php');

function getAllDoses()
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT 
            md.medicine_name,
            md.quantity_per_dose,
            mu.portuguese_name,
            ds.dose_id,
            ds.due_date,
            ds.due_time,
            ds.taken_date,
            ds.taken_time,
            ds.was_taken
        FROM doses ds 
        INNER JOIN medicines md on md.medicine_id = ds.medicine_id
        INNER JOIN measurement_units mu on mu.measurement_unit_id = md.measurement_unit_id
        ORDER BY ds.due_date, ds.due_time"
    );

    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getDosesFromMedicineId($medicine_id)
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT 
            md.medicine_name,
            md.quantity_per_dose,
            mu.portuguese_name,
            ds.dose_id,
            ds.due_date,
            ds.due_time,
            ds.taken_date,
            ds.taken_time,
            ds.was_taken
        FROM doses ds 
        INNER JOIN medicines md on md.medicine_id = ds.medicine_id
        INNER JOIN measurement_units mu on mu.measurement_unit_id = md.measurement_unit_id
        WHERE ds.medicine_id = :medicine_id
        ORDER BY ds.due_date, ds.due_time"
    );

    $statement->bindValue(':medicine_id', $medicine_id);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function createDose($dose)
{
    global $connection;
    $statement = $connection->prepare(
        "INSERT INTO doses(
            medicine_id, 
            due_date,
            due_time,
            taken_date,
            taken_time,
            was_taken
        ) VALUES (
            :medicine_id, 
            :due_date,
            :due_time,
            :taken_date,
            :taken_time,
            :was_taken
        )"
    );

    $statement->bindValue(':medicine_id', $dose['medicine_id']);
    $statement->bindValue(':due_date',    $dose['due_date']);
    $statement->bindValue(':due_time',    $dose['due_time']);
    $statement->bindValue(':taken_date',  $dose['taken_date']);
    $statement->bindValue(':taken_time',  $dose['taken_time']);
    $statement->bindValue(':was_taken',   $dose['was_taken']);
    $statement->execute();
}
