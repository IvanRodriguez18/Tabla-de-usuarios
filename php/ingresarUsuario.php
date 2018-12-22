<?php
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');
include '../includes/funciones.php';
$conecta = conexionBD();
if (!$conecta) {
    die();
}else{
    $nombres = limpiarDatos($_POST['nombre']);
    $edad = limpiarDatos($_POST['edad']);
    $pais = limpiarDatos($_POST['pais']);
    $correo = limpiarDatos($_POST['mail']);
    if (!empty($nombres) && !empty($edad) && !empty($pais) && !empty($correo)) {
        $sql_ingresa = "INSERT INTO usuarios VALUES(NULL, '$nombres', '$edad', '$pais', '$correo')";
        $resultado = insertaRegistro($sql_ingresa, $conecta);
        if ($resultado !== false) {
            if ($resultado->rowCount() == 1) {
                $respuesta = array('success' => 'true');
            }
        }
    }else{
        $respuesta = array('error' => 'false');
    }
    echo json_encode($respuesta);
}

?>