<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/configuraciones/gestiones/listado_gestiones.php')
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
                <h1 style="font-family: Algeria;">Nuevo Registro de Nivel</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Formulario de Registro</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form action="<?= APP_URL; ?>app/controllers/niveles/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Año Lectivo </label>
                                            <select name="gestion_id" id="gestion_id" class="form-control">
                                                <?php foreach ($gestiones as $gestion) {
                                                    if ($gestion['estado'] == 1) { ?>
                                                        <option value="<?= $gestion['id_gestion'] ?>"><?= $gestion['anio_lectivo'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Nivel</label>
                                            <select name="nivel" id="nivel" class="form-control">
                                                <option value="1">Inicial</option>
                                                <option value="2">Basica</option>
                                                <option value="3">Bachillerato</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Jornada</label>
                                            <select name="jornada" id="jornada" class="form-control">
                                                <option value="1">Matutina</option>
                                                <option value="2">Vespertina</option>
                                                <option value="3">Nocturna</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Estado</label>
                                            <select name="estado" id="estado" class="form-control">
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary"> Registrar</button>
                                        <a href="<?= APP_URL; ?>admin/niveles/" class="btn btn-sm btn-secondary">Cancelar</a>
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