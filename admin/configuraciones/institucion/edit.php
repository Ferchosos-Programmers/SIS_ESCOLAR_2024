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
</style>
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1 style="font-family: Algeria;">Editar Institución : <?= $nombre_institucion ?></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Formulario de Registro</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form action="<?= APP_URL; ?>app/controllers/configuraciones/instituciones/update.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="id_config_institucion" value="<?= $id_config_institucion ?>" hidden>
                                                    <input type="text" name="logo" value="<?= $logo ?>" hidden>
                                                    <label for="" style="font-family: Algeria;">Nombres de la Institución <span style="color: red">*</span></label>
                                                    <input type="text" name="nombre_institucion" value="<?= $nombre_institucion ?>" class="form-control" placeholder="Ingrese el de la Institución " required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" style="font-family: Algeria;">Email de la Institución </label>
                                                    <input type="email" name="correo" value="<?= $correo ?>" class="form-control" placeholder="Ingrese el de la Institución ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" style="font-family: Algeria;">Convencional de la Institución</label>
                                                    <input type="number" name="telefono" value="<?= $telefono ?>" class="form-control" placeholder="Ingrese el numero de la Institución">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" style="font-family: Algeria;">Celular de la Institución <span style="color: red">*</span></label>
                                                    <input type="number" name="celular" value="<?= $celular ?>" class="form-control" placeholder="Ingrese el numero de la Institución" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="font-family: Algeria;">Dirección de la Institución <span style="color: red">*</span></label>
                                                    <input type="text" name="direccion" value="<?= $direccion ?>" class="form-control" placeholder="Ingrese la direccion de  la Institución" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="font-family: Algeria;">Logo de la Institucion</label>
                                                    <input type="file" id="file" name="file" onchange="previewImage(event)">
                                                    <center>
                                                        <img id="output" src="<?= APP_URL . "/public/images/configuracion/" . $logo ?>" width="180px" height="180px" alt="Logo">
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-success"> Actualizar</button>
                                        <a href="<?= APP_URL; ?>admin/configuraciones/institucion" class="btn btn-sm btn-secondary">Cancelar</a>
                                    </div>
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