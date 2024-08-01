<?php
include('../../../app/config.php');
session_start(); // Inicia la sesión

$id_rol = $_POST['id_rol'];
$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol,'UTF-8');

if ($nombre_rol == "") {
    $_SESSION['mensaje'] = "Llenar el campo nombre del rol";
    $_SESSION['tipo'] = "error";
    header('Location:' . APP_URL . "/admin/roles/edit.php?id=".$id_rol);
    exit(); // Detener la ejecución del script después de la redirección
} else {
    $sentencia = $pdo->prepare("UPDATE roles SET nombre_rol=:nombre_rol, fyh_actualizacion=:fyh_actualizacion WHERE id_rol=:id_rol");

    $sentencia->bindParam(':nombre_rol', $nombre_rol);
    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia->bindParam(':id_rol', $id_rol);

    try {
        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = "Rol Actualizado con Exitoso";
            $_SESSION['tipo'] = "success";
            header('Location:' . APP_URL . "/admin/roles");
            exit(); // Detener la ejecución del script después de la redirección
        } else {
            $_SESSION['mensaje'] = "Error al actualizar el Rol";
            $_SESSION['tipo'] = "error";
            header('Location:' . APP_URL . "/admin/roles/edit.php?id=".$id_rol);
            exit(); // Detener la ejecución del script después de la redirección
        }
    } catch (Exception $exception) {
        $_SESSION['mensaje'] = "Error este rol ya existe en la base de datos";
        $_SESSION['tipo'] = "error";
        header('Location:' . APP_URL . "/admin/roles/edit.php?id=".$id_rol);
        exit(); // Detener la ejecución del script después de la redirección
    }


}
