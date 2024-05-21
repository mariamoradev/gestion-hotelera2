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
}


$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$nacionalidad = $_POST['nacionalidad'];
$telefono= $_POST['telefono'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$fechallegada = $_POST['fechallegada'];
$fechasalida = $_POST['fechasalida'];
$numeronoches = $_POST['numeronoches'];
$nombretarjeta = $_POST['nombretarjeta'];
$numerotarjeta = $_POST['numerotarjeta'];
$nombretitular = $_POST['nombretitular'];
$firmatitular = $_POST['firmatitular'];



$queryInsert = "INSERT INTO Reserva_Habitacion (Nombres, Apellidos, Cedula, Nacionalidad, Telefono, Email, Sexo, Fecha_llegada, Fecha_salida, Numero_noches, Nombre_tarjeta_credito, Numero_tarjeta_credito, Nombre_titular, Firma_titular) VALUES ('$nombres', '$apellidos', '$cedula', '$nacionalidad', '$telefono', '$email', '$sexo', '$fechallegada', '$fechasalida', '$numeronoches', '$nombretarjeta', '$numerotarjeta', '$nombretitular', '$firmatitular')";


$resultadoInsert = pg_query($conexion, $queryInsert);


if ($resultadoInsert) {
echo 'Datos insertados correctamente';
} else {
echo 'Error al insertar datos';
}


pg_close($conexion);
?>