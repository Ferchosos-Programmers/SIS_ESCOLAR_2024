<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
?>

<style>
    .content-wrapper {
        font-family: algeria;
    }
</style>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1 style="font-family: Algeria;">Configuraciones del Sistema</h1>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="bi bi-hospital"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Datos de la Institucion</b></span>
                            <a href="institucion" class="btn btn-primary btn-sm">Configurar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="bi bi-calendar-week"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Años Lectivos</b></span>
                            <a href="gestion" class="btn btn-info btn-sm">Configurar <i class="fas fa-arrow-circle-right"></i></a>
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