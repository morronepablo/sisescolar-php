<?php

include ('../app/config.php');

$email      = $_POST['email'];
$password   = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND estado = '1'";

$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
//print_r($usuarios);

$contador = 0;

foreach ($usuarios as $usuario) {
    $password_tabla = $usuario['password'];
    $contador = $contador + 1;
}

//echo hash('sha256', '12345678');

//$options = [
//    'cost' => 10,
//];
//echo password_hash("12345678", PASSWORD_BCRYPT, $options);


if(($contador > 0) && (password_verify($password,$password_tabla))) {
    echo "los datos son correctos";
    session_start();
    $_SESSION['mensaje'] = "Bienvenido al sistema.";
    $_SESSION['icono'] = "success";
    $_SESSION['sesion_email'] = $email;
    header('Location:'.APP_URL."/admin");
} else {
    echo "los datos son incorrectos";
    session_start();
    $_SESSION['mensaje'] = "Los datos introducidos son incorrectos, vuelva a intentarlo.";
    header('Location:'.APP_URL."/login");
}