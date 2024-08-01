<?php
include('../../../../app/config.php');
session_start(); // Inicia la sesión

$anio_lectivo = strtoupper($_POST['anio_lectivo']); // Convertir a mayúsculas
$estado = $_POST['estado'];

$sentencia = $pdo->prepare('INSERT INTO gestiones
    (anio_lectivo, fyh_creacion, estado)
    VALUES ( :anio_lectivo,:fyh_creacion,:estado)');

$sentencia->bindParam(':anio_lectivo', $anio_lectivo);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado);

if ($sentencia->execute()) {
    // echo 'success';
    $_SESSION['mensaje'] = "Año Lectivo Registrado con Exitoso";
    $_SESSION['tipo'] = "success";
    header('Location:' . APP_URL . "/admin/configuraciones/gestion/");
    exit();
} else {
    echo 'error al registrar a la base de datos';
    $_SESSION['mensaje'] = "Error al registrar el Año Lectivo";
    $_SESSION['tipo'] = "error";
    ?><script>window.history.back();</script><?php
    exit();
}
