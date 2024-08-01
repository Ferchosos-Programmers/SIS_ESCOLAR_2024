<?php
include('../../../app/config.php');
session_start(); // Inicia la sesión

$gestion_id = $_POST['gestion_id'];
$nivel = strtoupper($_POST['nivel']);
$jornada = strtoupper($_POST['jornada']);

$sentencia = $pdo->prepare('INSERT INTO niveles
(gestion_id,nivel,jornada, fyh_creacion, estado)
VALUES ( :gestion_id,:nivel,:jornada,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion_id', $gestion_id);
$sentencia->bindParam(':nivel', $nivel);
$sentencia->bindParam(':jornada', $jornada);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_registro);

if ($sentencia->execute()) {
    echo 'success';
    $_SESSION['mensaje'] = "Registro de Nivel Exitoso";
    $_SESSION['tipo'] = "success";
    header('Location:' . APP_URL . "/admin/niveles");
    exit(); // Detener la ejecución del script después de la redirección
} else {
    $_SESSION['mensaje'] = "Error al registrar el Nivel";
    $_SESSION['tipo'] = "error";
    ?><script>window.history.back();</script><?php
    exit(); // Detener la ejecución del script después de la redirección
}
