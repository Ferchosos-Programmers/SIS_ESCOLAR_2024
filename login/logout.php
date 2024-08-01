<?php
include('../app/config.php');
session_start();


// Finalmente, destruir la sesión.
session_destroy();

// Redirigir al usuario a la página de login.
header('Location: ' . APP_URL . '/login');
exit;
?>
