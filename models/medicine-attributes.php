<!-- 
    Model for the tables:
        - Medicine_Types
        - Frequency_Types,
        - Measurement_Units
    which are all simple tables to store 
    possible names for certain medicine attributes
-->

<?php
function getAllMedicineTypes()
{
    global $connection;
    // var_dump($connection);
    $statement = $connection->prepare(
        "SELECT
            medicine_type_id,
            portuguese_name
        FROM medicine_types"
    );

    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($results);
    return $results;
}

function getAllFrequencyTypes()
{
}

function getAllMeasurementUnits()
{
}
