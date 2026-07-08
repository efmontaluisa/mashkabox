<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "mashka_box";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$whatsapp = $_POST['whatsapp'];

$sql = "INSERT INTO inscripciones (nombre, email, whatsapp)
        VALUES ('$nombre', '$email', '$whatsapp')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Registro guardado correctamente');
            window.location.href='index.html';
          </script>";
} else {
    echo "<script>
            alert('Error al guardar');
            window.history.back();
          </script>";
}

$conn->close();
?>