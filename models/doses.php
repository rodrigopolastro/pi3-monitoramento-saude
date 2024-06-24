<?php

require_once fullPath('database/mysql-connection.php');

function getNextDoses($user_id)
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT 
            md.medicine_id,
            md.medicine_name,
            md.quantity_per_dose,
            mu.portuguese_name measurement_unit,
            ds.dose_id,
            ds.due_date,
            ds.due_time,
            ds.taken_date,
            ds.taken_time,
            ds.was_taken
        FROM doses ds 
        INNER JOIN medicines md on md.medicine_id = ds.medicine_id
        INNER JOIN measurement_units mu on mu.measurement_unit_id = md.measurement_unit_id
        WHERE ds.was_taken = FALSE
        AND md.user_id = :user_id
        ORDER BY ds.due_date ASC, ds.due_time ASC"
    );

    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function countMedicineDoses($medicine_id)
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT 
            (SELECT COUNT(*) FROM doses WHERE medicine_id = :medicine_id ) 
                AS 'total_doses',
            (SELECT COUNT(*) FROM doses WHERE medicine_id = :medicine_id 
                AND was_taken = TRUE) 
                AS 'taken_doses'"
    );

    $statement->bindValue(':medicine_id', $medicine_id);
    $statement->execute();
    $results = $statement->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function getDosesFromMedicineId($medicine_id)
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT 
            md.medicine_id,
            md.medicine_name,
            md.quantity_per_dose,
            mu.portuguese_name measurement_unit,
            ds.dose_id,
            ds.due_date,
            ds.due_time,
            ds.taken_date,
            ds.taken_time,
            ds.was_taken
        FROM doses ds 
        INNER JOIN medicines md on md.medicine_id = ds.medicine_id
        INNER JOIN measurement_units mu on mu.measurement_unit_id = md.measurement_unit_id
        WHERE ds.medicine_id = :medicine_id"
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

    return $connection->lastInsertId();
}

function takeDose($dose)
{
    global $connection;
    $statement = $connection->prepare(
        "UPDATE doses SET 
        was_taken = TRUE, 
        taken_date = :taken_date,
        taken_time = :taken_time
      WHERE dose_id = :dose_id"
    );

    $statement->bindValue(':dose_id', $dose['dose_id']);
    $statement->bindValue(':taken_date', $dose['taken_date']);
    $statement->bindValue(':taken_time', $dose['taken_time']);
    $statement->execute();
}

function setDoseNotTaken($dose)
{
    global $connection;
    $statement = $connection->prepare(
        "UPDATE doses SET 
        was_taken = FALSE, 
        taken_date = :taken_date,
        taken_time = :taken_time
      WHERE dose_id = :dose_id"
    );

    $statement->bindValue(':dose_id', $dose['dose_id']);
    $statement->bindValue(':taken_date', $dose['taken_date']);
    $statement->bindValue(':taken_time', $dose['taken_time']);
    $statement->execute();
}
