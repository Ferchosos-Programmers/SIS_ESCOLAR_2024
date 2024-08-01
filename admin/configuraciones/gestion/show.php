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

    .form-group p {
        font-weight: 400;
        color: #555;
        padding: 5px 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
    }
</style>
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1 style="font-family: Algeria;">Año Lectivo : <?= $anio_lectivo ?></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos Registrados</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="font-family: Algeria;">Año Lectivo </label>
                                        <p><?= $anio_lectivo ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="font-family: Algeria;">Estado</label>
                                        <p>
                                            <?php if ($estado == 1) : ?>
                                                Activo
                                            <?php else : ?>
                                                Inactivo
                                            <?php endif; ?>
                                        </p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" style="font-family: Algeria;">Fecha y hora de Creacion </label>
                                        <p><?= $fyh_creacion ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?= APP_URL; ?>admin/configuraciones/gestion" class="btn btn-sm btn-secondary">Volver</a>
                                </div>
                            </div>
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