<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar_id"])) {
    $id = $_POST["eliminar_id"];
    $email = $_POST["email_eliminar"];

    $sql = "DELETE FROM usuarios_table WHERE id=$id AND email='$email'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html"); 
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $conn->error;
    }
}

$conn->close();
?>
