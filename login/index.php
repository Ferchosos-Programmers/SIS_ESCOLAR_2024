<?php include('../app/config.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= APP_NAME; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= APP_URL; ?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= APP_URL; ?>public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= APP_URL; ?>public/dist/css/adminlte.min.css">
  <!-- notyf -->
  <link href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <h3 href="" style="font-family:Algeria"><b><?= APP_NAME; ?></b></h3>
    </div>
    <center>
      <img src="https://i0.wp.com/sglchile.cl/wp-content/uploads/2022/01/login-usuario-3.png?fit=256%2C256&ssl=1 " width="150px" alt="">
    </center>
    <br>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg" style="font-family:Algeria">Inicio de Sesión</p>

        <form action="controller_login.php" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
        </form>

        <!-- CUANDO HAY UNA SESION CON ESTE MENSAJE -->
        <?php
        session_start();
        if (isset($_SESSION['mensaje'])) {
          $mensaje = $_SESSION['mensaje'];
          unset($_SESSION['mensaje']); // Limpiar la sesión después de obtener el mensaje
        ?>
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '<?= $mensaje; ?>',
                showConfirmButton: false,
                timer: 3000,
                allowOutsideClick: false, // Evita que se cierre haciendo clic fuera
                position: 'center', // Puedes ajustar la posición según tus necesidades
                customClass: {
                  popup: 'animate__animated animate__fadeIn' // Añade animación de entrada
                }
              });
            });
          </script>

        <?php
        }
        ?>

      </div>
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= APP_URL; ?>/public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= APP_URL; ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= APP_URL; ?>/public/dist/js/adminlte.min.js"></script>
</body>

</html>