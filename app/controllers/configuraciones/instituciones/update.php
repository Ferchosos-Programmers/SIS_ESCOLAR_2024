<?php
include('../../../../app/config.php');
session_start(); // Inicia la sesión

$nombre_institucion = $_POST['nombre_institucion'];
$logo = $_POST['logo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$id_config_institucion = $_POST['id_config_institucion'];



if ($_FILES['file']['name'] != null) {
    // echo "Existe una imagen";
    $nombre_archivo = date('Y-m-d-H-i-s') . $_FILES['file']['name'];
    $location = "../../../../public/images/configuracion/" . $nombre_archivo;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    $logo = $nombre_archivo;
} else {
    // echo "No existe Imagen";
    if ($logo == "") {
        $logo = "";
    }else{
        $logo = $logo;
    }
}

$sentencia = $pdo->prepare('UPDATE  configuracion_instituciones SET
    nombre_institucion=:nombre_institucion,
    logo=:logo,
    direccion=:direccion,
    telefono=:telefono,
    celular=:celular,
    correo=:correo,
    fyh_actualizacion=:fyh_actualizacion
    WHERE id_config_institucion=:id_config_institucion');

$sentencia->bindParam(':nombre_institucion', $nombre_institucion);
$sentencia->bindParam(':logo', $logo);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':correo', $correo);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_config_institucion', $id_config_institucion);

if ($sentencia->execute()) {
    // echo 'success';
    //header('Location:' .$URL.'/');
    $_SESSION['mensaje'] = "Institución Actualizo con Exitoso";
    $_SESSION['tipo'] = "success";
    header('Location:' . APP_URL . "/admin/configuraciones/institucion/");
    exit();
} else {
    // echo 'error al registrar a la base de datos';
    $_SESSION['mensaje'] = "Error al actualizar la Institución";
    $_SESSION['tipo'] = "error";
    ?><script>window.history.back();</script><?php
    exit();
}
