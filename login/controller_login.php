<?php
include('../app/config.php');

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email = :email AND estado = '1'";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

$contador = 0;
$password_tabla = '';
foreach ($usuarios as $usuario) {
    $password_tabla = $usuario['password'];
    $contador++;
}

if ($contador > 0 && password_verify($password, $password_tabla)) {
    echo "Los datos son correctos";
    $_SESSION['mensaje'] = "Bienvenido al Sistema Escolar";
    $_SESSION['tipo'] = "success";
    $_SESSION['sesion_email'] = "$email";
    header('Location:' . APP_URL . "/admin");
} else {
    echo "Los datos son incorrectos";
    $_SESSION['mensaje'] = "Las credenciales son incorrectas";
    $_SESSION['tipo'] = "error";
    header('Location:' . APP_URL . "/login");
}
?>
