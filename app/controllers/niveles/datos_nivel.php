<?php 
    $sql_niveles = "SELECT * FROM niveles AS niv INNER JOIN gestiones AS ges ON niv.gestion_id = ges.id_gestion WHERE niv.estado = '1' AND niv.id_nivel = '$id_nivel'";
    $query_niveles = $pdo->prepare($sql_niveles);
    $query_niveles->execute();
    $niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);

    foreach($niveles as $niveles){
        $gestion_id = $niveles['gestion_id'];
        $gestion = $niveles['anio_lectivo'];
        $nivel = $niveles['nivel'];
        $jornada = $niveles['jornada'];
        $fyh_creacion = $niveles['fyh_creacion'];
        $estado = $niveles['estado'];
    }
?>