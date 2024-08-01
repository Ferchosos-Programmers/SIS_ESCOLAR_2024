<?php
$sql_gestiones = "SELECT * FROM gestiones WHERE id_gestion = '$id_gestion'";
$query_gestiones = $pdo->prepare($sql_gestiones);
$query_gestiones->execute();
$gestiones = $query_gestiones->fetchAll(PDO::FETCH_ASSOC);

foreach ($gestiones as $gestion) {
    $anio_lectivo = $gestion['anio_lectivo'];
    $estado = $gestion['estado'];
    $fyh_creacion = $gestion['fyh_creacion'];
    $fyh_actualizacion = $gestion['fyh_actualizacion'];
}
