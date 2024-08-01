<?php
include('../../../app/config.php');
session_start(); // Inicia la sesión

$id_usuario = $_POST['id_usuario'];
$nombres = $_POST['nombres'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];

$password = $_POST['password'];
$password_repet = $_POST['password_repet'];

if ($password == "") {

        $sentencia = $pdo->prepare("UPDATE usuarios 
            SET nombres=:nombres,
                rol_id=:rol_id,
                email=:email,
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_usuario=:id_usuario");
    
        $sentencia->bindParam(':nombres', $nombres);
        $sentencia->bindParam(':rol_id', $rol_id);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam('fyh_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);
    
        try{
            if($sentencia->execute()){
                $_SESSION['mensaje'] = "Usuario Actualizado con Exitoso";
                $_SESSION['tipo'] = "success";
                header('Location:' . APP_URL . "/admin/usuarios");
                exit();
            }else{
                $_SESSION['mensaje'] = "Error al actualizar el Usuario";
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

}else{
    if ($password == $password_repet) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sentencia = $pdo->prepare("UPDATE usuarios 
            SET nombres=:nombres,
                rol_id=:rol_id,
                email=:email,
                password=:password,
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_usuario=:id_usuario");
    
        $sentencia->bindParam(':nombres', $nombres);
        $sentencia->bindParam(':rol_id', $rol_id);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':password', $password);
        $sentencia->bindParam('fyh_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);
    
        try{
            if($sentencia->execute()){
                $_SESSION['mensaje'] = "Usuario Actualizado con Exitoso";
                $_SESSION['tipo'] = "success";
                header('Location:' . APP_URL . "/admin/usuarios");
                exit();
            }else{
                $_SESSION['mensaje'] = "Error al actualizar el Usuario";
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
}
