<?php

global $pdo;
$sql_grados = "SELECT * FROM grados as gra INNER JOIN niveles as niv ON gra.nivel_id = niv.id_nivel WHERE gra.estado = '1' ";
$query_grados = $pdo->prepare($sql_grados);
$query_grados->execute();
$grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);