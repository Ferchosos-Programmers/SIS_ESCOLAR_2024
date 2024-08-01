<?php
$id_rol = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/roles/datos_rol.php')
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
                <h1 style="font-family: Algeria;">Editar Rol : <?= $nombre_rol ?></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Editar Datos Registrados</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form action="<?= APP_URL; ?>app/controllers/roles/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol</label>
                                            <input type="text"  name="id_rol" value="<?= $id_rol ?>" hidden>
                                            <input type="text" class="form-control" name="nombre_rol" value="<?=$nombre_rol?>" >
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success"> Actualizar</button>
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
?>