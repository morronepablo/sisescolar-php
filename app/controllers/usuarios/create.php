<?php

    include ('../../../app/config.php');

    $nombres = $_POST['nombres'];
    $rol_id = $_POST['rol_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repet = $_POST['password_repet'];

    if($password == $password_repet) {
        //echo "las contraseñas son iguales";
        $options = [
            'cost' => 10,
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);

        $sentencia = $pdo->prepare('INSERT INTO usuarios
                (nombres,rol_id,email,password, fyh_creacion, estado)
        VALUES  ( :nombres,:rol_id,:email,:password,:fyh_creacion,:estado)');

        $sentencia->bindParam(':nombres',$nombres);
        $sentencia->bindParam(':rol_id',$rol_id);
        $sentencia->bindParam(':email',$email);
        $sentencia->bindParam(':password',$password);
        $sentencia->bindParam('fyh_creacion',$fechaHora);
        $sentencia->bindParam('estado',$estado_del_registro);

        try {
            if($sentencia->execute()){
                session_start();
                $_SESSION['mensaje'] = "Se registró el usuario correctamente.";
                $_SESSION['icono'] = "success";
                header('Location:'.APP_URL."/admin/usuarios");
            }else{
                session_start();
                $_SESSION['mensaje'] = "El email de este usuario ya existe.";
                $_SESSION['icono'] = "error";
                ?>
                <script>window.history.back();</script>
                <?php
            }

        } catch (Exception $exception) {
            session_start();
            $_SESSION['mensaje'] = "El email de este usuario ya existe.";
            $_SESSION['icono'] = "error";
            ?>
            <script>window.history.back();</script>
            <?php
        }

    } else {
        echo "las contraseñas no son iguales";
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas no son iguales.";
        $_SESSION['icono'] = "error";
        ?>
            <script>window.history.back();</script>
        <?php
    }




