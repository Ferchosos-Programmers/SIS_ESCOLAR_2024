<?php
$id_gestion = $_GET['id'];
include('../../../app/config.php');
include('../../../admin/layout/header.php');
include('../../../app/controllers/configuraciones/gestiones/datos_gestion.php');
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
                <h1 style="font-family: Algeria;">Editar Año Lectivo : <?= $anio_lectivo ?></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Editar Datos Registrados</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form action="<?= APP_URL; ?>app/controllers/configuraciones/gestiones/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="id_gestion" value="<?= $id_gestion ?>" hidden>
                                            <label for="" style="font-family: Algeria;">Año Lectivo </label>
                                            <input type="text" name="anio_lectivo" class="form-control" placeholder="Ingrese el Año Lectivo " value="<?= $anio_lectivo ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Estado</label>
                                            <select name="estado" id="estado" class="form-control">
                                                <?php if ($estado == 1) : ?>
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                <?php else : ?>
                                                    <option value="0">Inactivo</option>
                                                    <option value="1">Activo</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-success"> Actualizar</button>
                                        <a href="<?= APP_URL; ?>admin/configuraciones/gestion" class="btn btn-sm btn-secondary">Cancelar</a>
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
</div>
<?php
include('../../../admin/layout/footer.php');
include('../../../layout/mensajes.php');
?>