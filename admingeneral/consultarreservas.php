<?php

$host = 'localhost';
$dbname = 'GESTIONHOTELMJ';
$user = 'postgres';
$password = 'junior';


$conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if ($conexion) {
    echo '<h2>Conexión exitosa</h2><br>';
} else {
    echo 'No se pudo conectar: ' . pg_last_error();
    exit; 
}


$query = "SELECT * FROM Reserva_Habitacion";


$result = pg_query($conexion, $query);

if (!$result) {
    die("Error en la consulta SQL: " . pg_last_error());
}


echo '<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        color: #333;
        padding: 20px;
    }
    h1 {
        text-align: center;
        color: #4CAF50;
        font-size: 48px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 4px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        font-family: "Comic Sans MS", cursive, sans-serif;
        animation: fadeInDown 1s ease-in-out, colorChange 3s infinite alternate;
    }
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 0 auto;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        animation: fadeInUp 1s ease-in-out;
    }
    th, td {
        padding: 15px;
        text-align: left;
        border: 2px solid #4CAF50;
    }
    th {
        background-color: #4CAF50;
        color: white;
        width: 50%;
    }
    td {
        width: 50%;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #d1ffd1;
        transition: background-color 0.3s ease-in-out;
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes colorChange {
        from {
            color: #4CAF50;
        }
        to {
            color: #FF5733;
        }
    }
</style>';

echo '<h1>Información de Todos los Empleados</h1>';

if (pg_num_rows($result) > 0) {
    echo '<table>';
    echo '<tr>
            <th>ID Reserva</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cédula</th>
            <th>Nacionalidad</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Fecha Llegada</th>
            <th>Fecha Salida</th>
            <th>Numero Noches</th>
            <th>Nombre titular</th>
            <th>Firma titular</th>
          </tr>';
    while ($row = pg_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['ID_Reserva']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Apellidos']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Cedula']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Nacionalidad']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Telefono']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Sexo']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Fecha_llegada']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Fecha_salida']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Numero_noches']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Nombre_titular']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Firma_titular']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No se encontraron reservas.";
}


pg_close($conexion);
?>