<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "mashka_box";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$whatsapp = trim($_POST['whatsapp'] ?? '');

$stmt = $conn->prepare("INSERT INTO inscripciones (nombre, email, whatsapp) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $whatsapp);

if ($stmt->execute()) {
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

$stmt->close();
$conn->close();
?>
