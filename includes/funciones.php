<?php
function conexionBD()
{
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=usuarios_list', 'root', '');
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}
function limpiarDatos($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
function insertaRegistro($sql, $conecta)
{
    $statement = $conecta->prepare($sql);
    $statement->execute();
    return $statement;
}
function consultaRegistros($sql, $conecta)
{
    $statement = $conecta->prepare($sql);
    $statement->execute();
    $resultado = $statement->fetchAll();
    return $resultado;
}
?>