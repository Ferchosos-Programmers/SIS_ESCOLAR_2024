<?php
include('../../../app/config.php');
session_start(); // Inicia la sesión

$id_nivel = $_POST['id_nivel'];

$sentencia = $pdo->prepare("DELETE FROM niveles WHERE id_nivel=:id_nivel");

$sentencia->bindParam(':id_nivel', $id_nivel);


if ($sentencia->execute()) {
    $_SESSION['mensaje'] = "Nivel Eliminado con  Exitoso";
    $_SESSION['tipo'] = "success";
    header('Location:' . APP_URL . "/admin/niveles");
    exit(); // Detener la ejecución del script después de la redirección
} else {
    $_SESSION['mensaje'] = "Error al eliminar el Nivel";
    $_SESSION['tipo'] = "error";
    ?><script>window.history.back();</script><?php
    exit(); // Detener la ejecución del script después de la redirección
}
