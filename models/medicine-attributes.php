<!-- 
    Model for the tables:
        - Medicine_Types
        - Frequency_Types,
        - Measurement_Units
    which are all simple tables to store 
    possible names for certain medicine attributes
-->

<?php

require_once fullPath('database/connection.php');

function getAllMedicineTypes()
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT
            medicine_type_id,
            portuguese_name
        FROM medicine_types"
    );

    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getAllFrequencyTypes()
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT
            frequency_type_id,
            portuguese_name
        FROM frequency_types"
    );

    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getAllMeasurementUnits()
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT
            measurement_unit_id,
            portuguese_name
        FROM measurement_units"
    );

    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
