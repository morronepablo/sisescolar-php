<?php

global $pdo;
$sql_niveles = "SELECT * FROM niveles as niv INNER JOIN gestiones as ges ON niv.gestion_id = ges.id_gestion where niv.estado = '1' ";
$query_niveles = $pdo->prepare($sql_niveles);
$query_niveles->execute();
$niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);