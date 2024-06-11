<?php

require '../conexao.php';

function buscarMedicamentos(){
    //Retorno temporário
    $medicamentos = [
        [
            'nome' => 'Dipirona', 
            'doses_totais' => 5,
            'doses_tomadas' => 2,
        ],
        [
            'nome' => 'Neosaldina', 
            'doses_totais' => 10,
            'doses_tomadas' => 5,
        ],
        [
            'nome' => 'Dorflex', 
            'doses_totais' => 8,
            'doses_tomadas' => 8,
        ],
    ];

    return $medicamentos;
}