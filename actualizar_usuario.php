<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";



$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["actualizar_id"])) {
    $id = $_POST["actualizar_id"];
    $nombre = $_POST["nombre_actualizar"];
    $email = $_POST["email_actualizar"];
    $password = $_POST["password_actualizar"];

    $sql = "UPDATE usuarios_table SET nombre='$nombre', email='$email', password='$password' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html"); 
        exit();
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}

$conn->close();
?>
