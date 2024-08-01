<?php
include('../../../app/config.php');
session_start(); // Inicia la sesión

$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol,'UTF-8');

if ($nombre_rol == "") {
    $_SESSION['mensaje'] = "Llenar el campo nombre del rol";
    $_SESSION['tipo'] = "error";
    header('Location:' . APP_URL . "/admin/roles/create.php");
    exit(); // Detener la ejecución del script después de la redirección
} else {
    $sentencia = $pdo->prepare("INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES (:nombre_rol, :fyh_creacion, :estado)");

    $sentencia->bindParam(':nombre_rol', $nombre_rol);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);
    $sentencia->bindParam(':estado', $estado_registro);

    try {
        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = "Registro de Rol Exitoso";
            $_SESSION['tipo'] = "success";
            header('Location:' . APP_URL . "/admin/roles");
            exit(); // Detener la ejecución del script después de la redirección
        } else {
            $_SESSION['mensaje'] = "Error al registrar el Rol";
            $_SESSION['tipo'] = "error";
            header('Location:' . APP_URL . "/admin/roles/create.php");
            exit(); // Detener la ejecución del script después de la redirección
        }
    } catch (Exception $exception) {
        $_SESSION['mensaje'] = "Error este rol ya existe en la base de datos";
        $_SESSION['tipo'] = "error";
        header('Location:' . APP_URL . "/admin/roles/create.php");
        exit(); // Detener la ejecución del script después de la redirección
    }


}
