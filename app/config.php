<?php 
    define('SERVIDOR','localhost');
    define('USUARIO','root');
    define('PASSWORD','');
    define('BD','sis_gestion_escolar');

    define('APP_NAME','SISTEMA DE GESTIÓN ESCOLAR'); // NOMBRE DEL SISTEMA
    define('APP_URL','http://localhost/sis_gestion_escolar/'); // URL DEL SISTEMA
    define('kEY_API_MAPS',''); //UBICACIONES DE GOOGLE MAPS

    $servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

    try {
        $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        // echo "Conexión exitosa a la base de datos";
    } catch (PDOException $e) {
        echo "Error al conectar con la base de datos: " . $e->getMessage();
    }

    date_default_timezone_set('America/Guayaquil'); //ESTABLECIENDO LA ZONA HORARIA DE ECUADOR
    $fechaHora = date("Y-m-d H:i:s"); //FECHA Y HORA 
    $fecha_actual = date("Y-m-d"); //FECHA ACTUAL
    $dia_actual = date("d"); //DIA ACTUAL
    $mes_actual = date("m"); //MES ACTUAL
    $anio_actual = date("Y"); //ANIO ACTUAL
    $estado_registro = '1'; //ESTADO

?>