<?php

global $id_config_institucion, $pdo;
$sql_instituciones = "SELECT * FROM configuracion_instituciones WHERE id_config_institucion = '$id_config_institucion' AND estado = '1' ";
$query_instituciones = $pdo->prepare($sql_instituciones);
$query_instituciones->execute();
$instituciones = $query_instituciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($instituciones as $institucion) {
    $nombre_institucion = $institucion['nombre_institucion'];
    $direccion          = $institucion['direccion'];
    $telefono           = $institucion['telefono'];
    $celular            = $institucion['celular'];
    $correo             = $institucion['correo'];
    $logo               = $institucion['logo'];
}