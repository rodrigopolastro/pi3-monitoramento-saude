<?php
require_once fullPath('vendor/autoload.php');

use MongoDB\Client;

$connection_str = 'mongodb://localhost:27017';
$client = new MongoDB\Client($connection_str);

try {
    $db = $client->selectDatabase('health_monitoring');
    $sensors_data_collection = $db->selectCollection('sensors_data');
} catch (Exception $e) {
    printf($e->getMessage());
}
