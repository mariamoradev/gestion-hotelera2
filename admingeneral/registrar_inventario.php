<?php

$host = 'localhost';
$dbname = 'GESTIONHOTELMJ';
$user = 'postgres';
$password = 'junior';

$conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conexion) {
    die('No se pudo conectar: ' . pg_last_error());
}

$nombre_recurso = $_POST['nombre_recurso'];
$fecha_llegada = $_POST['fecha_llegada'];
$stock_min = $_POST['stock_min'];
$stock_max = $_POST['stock_max'];
$cantidad = $_POST['cantidad'];
$descripcion_producto = $_POST['descripcion_producto'];
$estado_producto = $_POST['estado_producto'];
$tipo_recurso = $_POST['tipo_recurso'];


if ($stock_min > $stock_max) {
    die('Error: El stock mínimo no puede ser mayor que el stock máximo.');
}


$queryInsert = "INSERT INTO Inventario (
                    Nombre_recurso, 
                    fecha_llegada, 
                    Stock_minimo, 
                    Stock_maximo, 
                    Cantidad, 
                    Descripcion_producto, 
                    Estado_producto, 
                    Tipo_recurso
                ) VALUES (
                    '$nombre_recurso', 
                    '$fecha_llegada', 
                    $stock_min, 
                    $stock_max, 
                    $cantidad, 
                    '$descripcion_producto', 
                    '$estado_producto', 
                    '$tipo_recurso'
                )";


$resultadoInsert = pg_query($conexion, $queryInsert);


if ($resultadoInsert) {
    echo 'Datos insertados correctamente';
} else {
    echo 'Error al insertar datos: ' . pg_last_error();
}

pg_close($conexion);
?>
