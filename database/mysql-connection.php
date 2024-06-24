<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "health_monitoring";

try {
    $connection = new PDO(
        "mysql:host=$server;dbname=$database",
        $user,
        $password
    );
} catch (PDOException $exception) {
    throw new PDOException($exception->getMessage(), (int) $exception->getCode());
}
