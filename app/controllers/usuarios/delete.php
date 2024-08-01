<?php
include('../../../app/config.php');
session_start(); // Inicia la sesión

$id_usuario = $_POST['id_usuario'];

$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");

$sentencia->bindParam(':id_usuario', $id_usuario);


if ($sentencia->execute()) {
    $_SESSION['mensaje'] = "Usuario Eliminado con  Exitoso";
    $_SESSION['tipo'] = "success";
    header('Location:' . APP_URL . "/admin/usuarios");
    exit(); // Detener la ejecución del script después de la redirección
} else {
    $_SESSION['mensaje'] = "Error al eliminar el Usuario";
    $_SESSION['tipo'] = "error";
    header('Location:' . APP_URL . "/admin/usuarios");
    exit(); // Detener la ejecución del script después de la redirección
}
