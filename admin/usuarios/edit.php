<?php
$id_usuario = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/usuarios/datos_usuario.php');
include('../../app/controllers/roles/listado_roles.php')
?>
<style>
    .content-wrapper {
        font-family: algeria;
    }

    .add-role-btn {
        display: flex;
        align-items: center;
        justify-content: center;

        color: #fff;
        padding: 0.375rem 0.75rem;
    }
</style>
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1 style="font-family: Algeria;">Editar Usuario: <?= $nombres ?></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Editar Datos Registrados</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form action="<?= APP_URL; ?>app/controllers/usuarios/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Nombres del Usuario</label>
                                            <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
                                            <input type="text" name="nombres" value="<?= $nombres; ?>" class="form-control" placeholder="Ingrese el Nombre del Usuario" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="roleSelect" style="font-family: Algeria;">Nombre del Rol</label>
                                            <div class="input-group">
                                                <select name="rol_id" class="form-control">
                                                    <?php foreach ($roles as $role) {
                                                        $nombre_rol_tabla = $role['nombre_rol'] ?>
                                                        <option value="<?= $role['id_rol'] ?>" <?php if ($nombre_rol == $nombre_rol_tabla) { ?> selected="selected" <?php } ?>><?= $role['nombre_rol'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <a href="<?= APP_URL ?>/admin/roles/create.php" class="btn btn-primary btn-sm add-role-btn" title="Crear Nuevo Rol">
                                                        <i class="bi bi-plus-lg"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Email</label>
                                            <input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="Ingrese el Email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Contraseña</label>
                                            <input type="password" name="password"  class="form-control" placeholder="Ingrese su Contraseña" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Confirmar su Contraseña</label>
                                            <input type="password" name="password_repet" class="form-control" placeholder="Verificar su Contraseña" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-success"> Actualizar</button>
                                        <a href="<?= APP_URL; ?>admin/usuarios" class="btn btn-sm btn-secondary">Cancelar</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../../admin/layout/footer.php');
include('../../layout/mensajes.php');
?>