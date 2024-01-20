<?php
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

if($nombre == "" || $correo == "" || $mensaje == ""){
    ?>
    <script>
        alert("No puedes enviar datos vacíos");
    </script>
    <?php
    header("location:pages/contacto.html");
} else {
    $conn = new mysqli("localhost", "root", "9455", "abintermedia programacion");

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contacto (correo, nombre, mensaje) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $correo, $nombre, $mensaje);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    ?>
    <script>
        alert("Mensaje enviado correctamente");
    </script>
    <?php
    header("location:pages/contacto.html");
}


?>