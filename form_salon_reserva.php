<?php

$host = 'localhost';
$dbname = 'GESTIONHOTELMJ';
$user = 'postgres';
$password = 'junior';


$conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if ($conexion) {
    echo 'Conexión exitosa';
} else {
    echo 'No se pudo conectar: ' . pg_last_error();
    exit; 
}


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$banco = $_POST['banco'];
$numerocuenta = $_POST['numerocuenta'];
$salon = $_POST['salon'];
$fechaevento = $_POST['fechaevento'];
$tipoevento = $_POST['tipoevento'];
$serviciosadicionales = $_POST['serviciosadicionales'];



$queryInsert = "INSERT INTO Reserva_Evento (Nombre_Completo, Correo_Electronico, Telefono, Cuenta_Bancaria, Numero_Cuenta, Seleccione_Salon, Fecha_evento, Tipo_evento, Servicios_Adicionales) VALUES ('$nombre', '$email', '$telefono', '$banco', '$numerocuenta', '$salon', '$fechaevento', '$tipoevento', '$serviciosadicionales')";


$resultadoInsert = pg_query($conexion, $queryInsert);


if ($resultadoInsert) {
    echo 'Datos insertados correctamente';
} else {
    echo 'Error al insertar datos: ' . pg_last_error($conexion);
}

pg_close($conexion);
?>
