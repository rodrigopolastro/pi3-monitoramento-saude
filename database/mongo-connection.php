<?php
require 'vendor/autoload.php';
use MongoDB\Client;

$connection_str = 'mongodb://localhost:27017';
$client = new MongoDB\Client($connection_str);

try {
    echo 'Connection Successful!';
} catch (Exception $e) {
    printf($e->getMessage());
}