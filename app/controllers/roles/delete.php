<?php
include('../../../app/config.php');
session_start(); // Inicia la sesión

$id_rol = $_POST['id_rol'];

$sentencia = $pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");
$sentencia->bindParam(':id_rol', $id_rol);


try {
    if ($sentencia->execute()) {
        $_SESSION['mensaje'] = "Rol Eliminado con  Exitoso";
        $_SESSION['tipo'] = "success";
        header('Location:' . APP_URL . "/admin/roles");
        exit(); // Detener la ejecución del script después de la redirección
    } else {
        $_SESSION['mensaje'] = "Error al eliminar el Rol";
        $_SESSION['tipo'] = "error";
        header('Location:' . APP_URL . "/admin/roles");
        exit(); // Detener la ejecución del script después de la redirección
    }
} catch (Exception $exception) {
    $_SESSION['mensaje'] = "Error no se puede eliminar este rol, esta en uso";
    $_SESSION['tipo'] = "error";
    header('Location:' . APP_URL . "/admin/roles");
    exit(); // Detener la ejecución del script después de la redirección
}
