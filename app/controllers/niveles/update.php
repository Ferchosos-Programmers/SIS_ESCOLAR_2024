<?php
include('../../../app/config.php');
session_start(); // Inicia la sesión

$id_nivel = $_POST['id_nivel'];
$gestion_id = $_POST['gestion_id'];
$nivel = strtoupper($_POST['nivel']);
$jornada = strtoupper($_POST['jornada']);

$sentencia = $pdo->prepare('UPDATE niveles SET gestion_id=:gestion_id,nivel=:nivel,jornada=:jornada, fyh_actualizacion=:fyh_actualizacion WHERE id_nivel=:id_nivel');

$sentencia->bindParam(':gestion_id', $gestion_id);
$sentencia->bindParam(':nivel', $nivel);
$sentencia->bindParam(':jornada', $jornada);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_nivel', $id_nivel);

if ($sentencia->execute()) {
    echo 'success';
    $_SESSION['mensaje'] = "Nivel Actualizado con Exito";
    $_SESSION['tipo'] = "success";
    header('Location:' . APP_URL . "/admin/niveles");
    exit(); // Detener la ejecución del script después de la redirección
} else {
    $_SESSION['mensaje'] = "Error al actualizar el Nivel";
    $_SESSION['tipo'] = "error";
    ?><script>window.history.back();</script><?php
    exit(); // Detener la ejecución del script después de la redirección
}
