<?php

$host = 'localhost';
$dbname = 'GESTIONHOTELMJ';
$user = 'postgres';
$password = 'junior';


$conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conexion) {
    die('No se pudo conectar: ' . pg_last_error());
}


$id_inventario = $_POST['id_inventario'];
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

// Consulta de actualización
$queryUpdate = "UPDATE Inventario SET 
                Nombre_recurso = '$nombre_recurso', 
                fecha_llegada = '$fecha_llegada', 
                Stock_minimo = '$stock_min', 
                Stock_maximo = '$stock_max', 
                Cantidad = '$cantidad', 
                Descripcion_producto = '$descripcion_producto', 
                Estado_producto = '$estado_producto', 
                Tipo_recurso = '$tipo_recurso'
                WHERE ID_inventario = '$id_inventario'";


$resultadoUpdate = pg_query($conexion, $queryUpdate);

if ($resultadoUpdate) {
    echo 'Datos actualizados correctamente';
} else {
    echo 'Error al actualizar datos: ' . pg_last_error();
}


pg_close($conexion);
?>
