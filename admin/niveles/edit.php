<?php
$id_nivel = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/niveles/datos_nivel.php');
include('../../app/controllers/configuraciones/gestiones/listado_gestiones.php');

// Fetch the grade details
$sql_niveles = "SELECT * FROM niveles AS niv INNER JOIN gestiones AS ges ON niv.gestion_id = ges.id_gestion WHERE niv.estado = '1' AND niv.id_nivel = :id_nivel";
$query_niveles = $pdo->prepare($sql_niveles);
$query_niveles->bindParam(':id_nivel', $id_nivel, PDO::PARAM_INT);
$query_niveles->execute();
$niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);

if (count($niveles) > 0) {
    $nivelDetails = $niveles[0]; // Assuming there is only one record for the given id_nivel
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
</style>
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1 style="font-family: Algeria;">Editar Nivel: <?= $gradeString; ?></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: Algeria;">Editar Datos Registrados</h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form action="<?= APP_URL; ?>app/controllers/niveles/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Año Lectivo </label>
                                            <input type="hidden" name="id_nivel" value="<?= $id_nivel; ?>">
                                            <select name="gestion_id" id="gestion_id" class="form-control">
                                                <?php foreach ($gestiones as $gestion) {
                                                    if ($gestion['estado'] == 1) { ?>
                                                        <option value="<?= $gestion['id_gestion'] ?>" <?php if ($gestion_id == $gestion['id_gestion']) { ?> selected="selected" <?php } ?>>
                                                            <?= $gestion['anio_lectivo'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Grados</label>
                                            <select name="nivel" id="nivel" class="form-control">
                                                <option value="1" <?php if ($nivel == '1') { ?> selected="selected" <?php } ?>>Inicial</option>
                                                <option value="2" <?php if ($nivel == '2') { ?> selected="selected" <?php } ?>>Basica</option>
                                                <option value="3" <?php if ($nivel == '3') { ?> selected="selected" <?php } ?>>Bachillerato</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Algeria;">Jornada</label>
                                            <select name="jornada" id="jornada" class="form-control">
                                                <option value="1" <?php if ($jornada == '1') { ?> selected="selected" <?php } ?>>Matutina</option>
                                                <option value="2" <?php if ($jornada == '2') { ?> selected="selected" <?php } ?>>Vespertina</option>
                                                <option value="3" <?php if ($jornada == '3') { ?> selected="selected" <?php } ?>>Nocturna</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-success"> Actualizar</button>
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