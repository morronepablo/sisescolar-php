<?php
global $pdo;
include ('../../../../app/config.php');

$id_gestion = $_POST['id_gestion'];
$gestion = $_POST['gestion'];
$estado = $_POST['estado'];

$sentencia = $pdo->prepare('UPDATE gestiones
SET gestion=:gestion, 
    fyh_actualizacion=:fyh_actualizacion, 
    estado=:estado
WHERE id_gestion=:id_gestion');

$sentencia->bindParam(':gestion',$gestion);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('estado',$estado);
$sentencia->bindParam('id_gestion',$id_gestion);

if($sentencia->execute()){
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se actualizó la gestión correctamente.";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/configuraciones/gestion");
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error, no se puedo actualizar la gestión.";
    $_SESSION['icono'] = "error";
    ?>
    <script>window.history.back();</script>
    <?php
}