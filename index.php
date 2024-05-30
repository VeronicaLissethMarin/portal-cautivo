<?php
$servername = "192.168.2.10";
$username = "radius";
$password = "Cupon23finder!";
$dbname = "radius";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    // Consulta para verificar las credenciales
    $sql = "SELECT * FROM radcheck WHERE UserName='$user' AND Attribute='Cleartext-Password' AND Value='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Credenciales correctas, redirigir al portal cautivo
        header("Location: http://192.168.5.1:8002");  // Ajusta la URL a la página de destino deseada
        exit();
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}

$conn->close();
?>
