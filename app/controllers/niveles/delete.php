<?php

global $pdo;
include ('../../../app/config.php');

$id_nivel = $_POST['id_nivel'];


$sentencia = $pdo->prepare("DELETE FROM niveles where id_nivel=:id_nivel ");

$sentencia->bindParam('id_nivel',$id_nivel);


if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino el nivel correctamente.";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/niveles");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
