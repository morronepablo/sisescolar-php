<?php

global $pdo;
include('../../../app/config.php');

$id_nivel = $_POST['id_nivel'];

$sentencia = $pdo->prepare("DELETE FROM niveles WHERE id_nivel=:id_nivel ");

$sentencia->bindParam('id_nivel', $id_nivel);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se eliminó el nivel correctamente.";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/niveles");
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo eliminar el nivel.";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/niveles");
}