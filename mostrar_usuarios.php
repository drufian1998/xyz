<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener lista de usuarios
$sql = "SELECT * FROM usuarios_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>";
        echo "<a href='#' onclick='mostrarFormularioActualizar(\"" . $row["id"] . "\", \"" . $row["nombre"] . "\", \"" . $row["email"] . "\")'>Actualizar</a> | ";
        echo "<a href='#' onclick='eliminarUsuario(\"" . $row["id"] . "\", \"" . $row["email"] . "\")'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No se encontraron usuarios</td></tr>";
}

$conn->close();
?>
