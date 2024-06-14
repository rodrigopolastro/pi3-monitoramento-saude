<?php

require_once fullPath('database/connection.php');

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
