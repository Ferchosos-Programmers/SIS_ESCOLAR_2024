<?php
include('../../../../app/config.php');
session_start(); // Inicia la sesión

$nombre_institucion = $_POST['nombre_institucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];

if ($_FILES['file']['name'] != null) {
    // echo "Existe una imagen";
    $nombre_archivo = date('Y-m-d-H-i-s') . $_FILES['file']['name'];
    $location = "../../../../public/images/configuracion/" . $nombre_archivo;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    $logo = $nombre_archivo;
} else {
    // echo "No existe Imagen";
    $logo = "";
}

$sentencia = $pdo->prepare('INSERT INTO configuracion_instituciones
(nombre_institucion,logo,direccion,telefono,celular,correo, fyh_creacion, estado)
VALUES ( :nombre_institucion,:logo,:direccion,:telefono,:celular,:correo,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_institucion', $nombre_institucion);
$sentencia->bindParam(':logo', $logo);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':correo', $correo);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_registro);

if ($sentencia->execute()) {
    // echo 'success';
    //header('Location:' .$URL.'/');
    $_SESSION['mensaje'] = "Institución Registrado con Exitoso";
    $_SESSION['tipo'] = "success";
    header('Location:' . APP_URL . "/admin/configuraciones/institucion/");
    exit();
} else {
    // echo 'error al registrar a la base de datos';
    $_SESSION['mensaje'] = "Error al registrar la Institución";
    $_SESSION['tipo'] = "error";
    ?><script>window.history.back();</script><?php
    exit();
}
