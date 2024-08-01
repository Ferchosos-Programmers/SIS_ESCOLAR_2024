<?php
include('../../../app/config.php');
session_start(); // Inicia la sesión

$nombres = $_POST['nombres'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repet = $_POST['password_repet'];

if ($password == $password_repet) {
    // echo "las contraseñas son igules";
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sentencia = $pdo->prepare('INSERT INTO usuarios(nombres,rol_id,email,password, fyh_creacion, estado) VALUES ( :nombres,:rol_id,:email,:password,:fyh_creacion,:estado)');

    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_registro);

    try{
        if($sentencia->execute()){
            $_SESSION['mensaje'] = "Usuario Registrado con Exitoso";
            $_SESSION['tipo'] = "success";
            header('Location:' . APP_URL . "/admin/usuarios");
            exit();
        }else{
            $_SESSION['mensaje'] = "Error al registrar Usuario";
            $_SESSION['tipo'] = "error";
            ?><script>window.history.back();</script><?php
            exit();
        }
    }catch(Exception $exception) {
        $_SESSION['mensaje'] = "El email ya esta registrado";
        $_SESSION['tipo'] = "error";
        ?><script>window.history.back();</script><?php
        exit();
    }

} else {
    // echo "las contraseñas no coiciden";
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    $_SESSION['tipo'] = "error";
    ?><script>window.history.back();</script><?php
    exit();
}