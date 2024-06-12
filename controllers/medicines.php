<?php
require '../models/medicines.php';

if(isset($_POST['action'])){
    $acao = $_POST['action'];
    
    switch ($action){
        case 'select_medicines':
            $medicines = getAllMedicines();
            return $select_medicines;
            break;
        
        case 'insert_medicine':
            break;
    }
}

$select_medicines = [
    'teste' => 'funcionou?',
    'claro' => 'que sim.'
];
echo json_encode($select_medicines);