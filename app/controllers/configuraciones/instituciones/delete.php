<?php
include('../../../../app/config.php');
session_start(); // Inicia la sesión

$id_config_institucion = $_POST['id_config_institucion'];

$sentencia = $pdo->prepare("DELETE FROM configuracion_instituciones WHERE id_config_institucion=:id_config_institucion");

$sentencia->bindParam(':id_config_institucion', $id_config_institucion);


if ($sentencia->execute()) {
    $_SESSION['mensaje'] = "Institucion Eliminado con  Exitoso";
    $_SESSION['tipo'] = "success";
    header('Location:' . APP_URL . "/admin/configuraciones/institucion");
    exit(); // Detener la ejecución del script después de la redirección
} else {
    $_SESSION['mensaje'] = "Error al eliminar la Institucion";
    $_SESSION['tipo'] = "error";
    ?><script>window.history.back();</script><?php
    exit(); // Detener la ejecución del script después de la redirección
}
