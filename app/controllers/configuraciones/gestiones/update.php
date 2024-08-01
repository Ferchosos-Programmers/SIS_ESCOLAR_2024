<?php
include('../../../../app/config.php');
session_start(); // Inicia la sesión

$id_gestion = $_POST['id_gestion'];
$anio_lectivo = strtoupper($_POST['anio_lectivo']); // Convertir a mayúsculas
$estado = $_POST['estado'];

$sentencia = $pdo->prepare('UPDATE gestiones SET anio_lectivo = :anio_lectivo, estado = :estado, fyh_actualizacion = :fyh_actualizacion WHERE id_gestion = :id_gestion');

$sentencia->bindParam(':anio_lectivo', $anio_lectivo);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('estado', $estado);
$sentencia->bindParam('id_gestion', $id_gestion);

if ($sentencia->execute()) {
    // echo 'success';
    $_SESSION['mensaje'] = "Año Lectivo Actualizado con Exitoso";
    $_SESSION['tipo'] = "success";
    header('Location:' . APP_URL . "/admin/configuraciones/gestion/");
    exit();
} else {
    // echo 'error al registrar a la base de datos';
    $_SESSION['mensaje'] = "Error al Actualizar el Año Lectivo";
    $_SESSION['tipo'] = "error";
    ?><script>window.history.back();</script><?php
    exit();
}
