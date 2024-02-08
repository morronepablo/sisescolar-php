<?php

global $pdo;
include ('../../../../app/config.php');

$gestion = $_POST['gestion'];
$estado = $_POST['estado'];

$sentencia = $pdo->prepare('INSERT INTO gestiones
(gestion, fyh_creacion, estado)
VALUES ( :gestion,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion',$gestion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado);

if($sentencia->execute()){
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se registró la gestión correctamente.";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/configuraciones/gestion");
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error, no se puedo registrar la gestión.";
    $_SESSION['icono'] = "error";
    ?>
    <script>window.history.back();</script>
    <?php
}