<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
?>
<style>
    .content-wrapper{
        font-family: algeria;
    }
</style>
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1 style="font-family: Algeria;">Nuevo Registro de Rol</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Formulario de Registro</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form action="<?= APP_URL; ?>app/controllers/roles/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Nombre del Rol <span style="color: red">*</span></label>
                                            <input type="text" name="nombre_rol" class="form-control" placeholder="Ingrese el Rol" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary"> Registrar</button>
                                        <a href="<?= APP_URL; ?>admin/roles" class="btn btn-sm btn-secondary">Cancelar</a>
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