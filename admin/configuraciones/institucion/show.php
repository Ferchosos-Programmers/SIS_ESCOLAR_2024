<?php
$id_config_institucion = $_GET['id'];
include('../../../app/config.php');
include('../../../admin/layout/header.php');
include('../../../app/controllers/configuraciones/instituciones/datos_institucion.php');
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

    .image-preview {
        margin-top: 10px;
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                <h1 style="font-family: Algeria;">Institución: <?= $nombre_institucion; ?></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Datos Registrados</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" style="font-family: Algeria;">Nombres de la Institución <span style="color: red">*</span></label>
                                                <p><?= $nombre_institucion ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" style="font-family: Algeria;">Email de la Institución </label>
                                                <p><?= $correo ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" style="font-family: Algeria;">Convencional de la Institución</label>
                                                <p><?= $telefono ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" style="font-family: Algeria;">Celular de la Institución <span style="color: red">*</span></label>
                                                <p><?= $celular ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" style="font-family: Algeria;">Dirección de la Institución <span style="color: red">*</span></label>
                                                <p><?= $direccion ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" style="font-family: Algeria;">Logo de la Institucion</label>
                                                <br><br>
                                                <center>
                                                    <img src="<?= APP_URL . "/public/images/configuracion/" . $logo ?>" width="180px" height="180px" alt="Logo">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?= APP_URL; ?>admin/configuraciones/institucion" class="btn btn-sm btn-secondary">Volver</a>
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
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<?php
include('../../../admin/layout/footer.php');
include('../../../layout/mensajes.php');
?>