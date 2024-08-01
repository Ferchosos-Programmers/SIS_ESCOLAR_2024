<?php
$id_usuario = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/usuarios/datos_usuario.php');
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
                <h1 style="font-family: Algeria;">Usuario: <?=$nombres;?></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Datos Registrados</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Nombres del Usuario</label>
                                            <p><?=$nombres?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="roleSelect" style="font-family: Algeria;">Nombre del Rol</label>
                                            <p><?=$nombre_rol?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Email</label>
                                            <p><?=$email?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Fecha de Registro</label>
                                            <p><?=$fyh_creacion?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Estado</label>
                                            <p><?php
                                                if ($estado == '1') {
                                                    echo "ACTIVO";
                                                }else{
                                                    echo "INACTIVO";
                                                }
                                            ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <a href="<?= APP_URL; ?>admin/usuarios" class="btn btn-sm btn-secondary">Volver</a>
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