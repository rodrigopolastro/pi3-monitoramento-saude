<?php

function buscarMedicamentos()
{
    global $connection;
    $statement = $connection->prepare(
        "SELECT
            id_medicamento,
            nome,
            descricao,
            doses_totais,
            doses_tomadas,
            inicio_tratamento,
            fim_tratamento
        FROM medicamentos"
    );

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}