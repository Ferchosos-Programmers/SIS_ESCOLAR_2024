<?php include('../app/config.php'); ?>
<?php include('../admin/layout/header.php'); ?>
<?php include('../app/controllers/roles/listado_roles.php'); ?>
<?php include('../app/controllers/usuarios/listado_usuarios.php'); ?>
<?php include('../app/controllers/niveles/listado_niveles.php'); ?>

<style>
  .content-wrapper{
    font-family:algeria;
  }
</style>

<div class="content-wrapper">
  <br>
  <div class="content">
    <div class="container">
      <div class="row">
        <h1 style="font-family: Algeria;"><?=APP_NAME?></h1>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php 
                $contador_roles = 0;
                foreach ($roles as $role) {
                  $contador_roles = $contador_roles + 1;
                }
              ?>
              <h3><?=$contador_roles;?></h3>
              <p>Roles Registrados</p>
            </div>
            <div class="icon">
              <i class="fas"><i class="bi bi-bookmarks-fill"></i></i>
            </div>
            <a href="<?=APP_URL?>/admin/roles" class="small-box-footer">
              Mas información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php 
                $contador_usuarios = 0;
                foreach ($usuarios as $usuario) {
                  $contador_usuarios = $contador_usuarios + 1;
                }
              ?>
              <h3><?=$contador_usuarios;?></h3>
              <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
              <i class="fas"><i class="bi bi-people-fill"></i></i>
            </div>
            <a href="<?=APP_URL?>/admin/usuarios" class="small-box-footer">
              Mas información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <?php 
                $contador_niveles = 0;
                foreach ($niveles as $nivel) {
                  $contador_niveles = $contador_niveles + 1;
                }
              ?>
              <h3><?=$contador_niveles;?></h3>
              <p>Niveles Registrados</p>
            </div>
            <div class="icon">
              <i class="fas"><i class="bi bi-easel-fill"></i></i>
            </div>
            <a href="<?=APP_URL?>/admin/niveles" class="small-box-footer">
              Mas información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?php
include('../admin/layout/footer.php');
include('../layout/mensajes.php');
?>