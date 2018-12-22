<?php
header('Content-Type: application/json; charset=utf-8');
include '../includes/funciones.php';
$conecta = conexionBD();
if (!$conecta)
{
    die();
}else {
    $sql_consulta = 'SELECT * FROM usuarios';
    $resultado = consultaRegistros($sql_consulta, $conecta);
    if ($resultado !== false) {
        echo json_encode($resultado);
    }
}
?>