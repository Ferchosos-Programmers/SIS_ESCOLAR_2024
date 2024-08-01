<?php
$id_nivel = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/niveles/datos_nivel.php');

// Fetch the grade details
$sql_niveles = "SELECT niv.*, ges.anio_lectivo FROM niveles AS niv INNER JOIN gestiones AS ges ON niv.gestion_id = ges.id_gestion WHERE niv.estado = '1' AND niv.id_nivel = :id_nivel";
$query_niveles = $pdo->prepare($sql_niveles);
$query_niveles->bindParam(':id_nivel', $id_nivel, PDO::PARAM_INT);
$query_niveles->execute();
$niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);

if (count($niveles) > 0) {
    $nivelDetails = $niveles[0]; // Assuming there is only one record for the given id_nivel
    $fyh_creacion = $nivelDetails['fyh_creacion'];
}

// Mapping array
$gradeNames = [
    1 => 'Inicial',
    2 => 'Basica',
    3 => 'Bachillerato',
];

$gradeNamesJornadas = [
    1 => 'Matutina',
    2 => 'Vespertina',
    3 => 'Nocturna'
];

// Translate the numeric grade to its string representation
$gradeString = $gradeNames[$nivelDetails['nivel']] ?? 'No existe';
$jornadaString = $gradeNamesJornadas[$nivelDetails['jornada']] ?? 'No existe';

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
                <h1 style="font-family: Algeria;">Anio Lectivo: <?= $gestion; ?></h1>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Año Lectivo </label>
                                            <p><?= $gestion; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Nivel</label>
                                            <p><?= $gradeString; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Jornada</label>
                                            <p><?= $jornadaString; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Estado</label>
                                            <p><?php
                                                if ($estado == '1') {
                                                    echo "ACTIVO";
                                                } else {
                                                    echo "INACTIVO";
                                                }
                                                ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Fecha de Creacion</label>
                                            <p><?= $fyh_creacion; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <a href="<?= APP_URL; ?>admin/niveles/" class="btn btn-sm btn-secondary">Volver</a>
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