<?php
// Conexión a la base de datos
$servername = "192.168.2.10";
$username = "radius";
$password = "Cupon23finder!";
$dbname = "radius";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$auth_user = $_POST['auth_user'];
$auth_pass = $_POST['auth_pass'];

$sql = "INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES ('$auth_user', 'Cleartext-Password', ':=', '$auth_pass')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso. <a href='/login.html'>Iniciar sesión</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
