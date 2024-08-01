<?php
$id_rol = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/roles/datos_rol.php')
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
                <h1 style="font-family: Algeria;">Rol : <?= $nombre_rol ?></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos Registrados</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form action="<?= APP_URL; ?>app/controllers/roles/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol</label>
                                            <p><?= $nombre_rol ?></p>
                                        </div>
                                        <a href="<?= APP_URL; ?>admin/roles" class="btn btn-sm btn-secondary">Volver</a>
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