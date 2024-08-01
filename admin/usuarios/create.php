<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/roles/listado_roles.php');
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
                <h1 style="font-family: Algeria;">Nuevo Registro de Usuario</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Formulario de Registro</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form action="<?= APP_URL; ?>app/controllers/usuarios/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Nombres del Usuario <span style="color: red">*</span></label>
                                            <input type="text" name="nombres" class="form-control" placeholder="Ingrese el Nombre del Usuario" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="roleSelect" style="font-family: Algeria;">Nombre del Rol</label>
                                            <div class="input-group">
                                                <select name="rol_id" class="form-control">
                                                    <?php foreach ($roles as $role) { ?>
                                                        <option value="<?= $role['id_rol'] ?>"><?= $role['nombre_rol'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <a href="<?= APP_URL ?>/admin/roles/create.php" class="btn btn-primary btn-sm add-role-btn" title="Crear Nuevo Rol">
                                                        <i class="bi bi-plus-lg" ></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Email <span style="color: red">*</span></label>
                                            <input type="email" name="email" class="form-control" placeholder="Ingrese el Email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Contraseña <span style="color: red">*</span></label>
                                            <input type="password" name="password" class="form-control" placeholder="Ingrese su Contraseña" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Confirmar su Contraseña <span style="color: red">*</span></label>
                                            <input type="password" name="password_repet" class="form-control" placeholder="Verificar su Contraseña" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary"> Registrar</button>
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