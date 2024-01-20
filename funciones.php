<?php
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

if($nombre == "" || $correo == "" || $mensaje == ""){
    ?>
    <script>
        alert("No puedes enviar datos vacíos");
        window.location.href = "pages/contacto.html";
    </script>
    <?php
} else {
    $conn = new mysqli("localhost", "root", "9455", "abintermedia programacion");

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contacto (correo, nombre, mensaje) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $correo, $nombre, $mensaje);
    
    if ($stmt->execute()) {
        ?>
        <script>
            alert("Mensaje enviado correctamente");
            window.location.href = "pages/contacto.html";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Error al enviar el mensaje");
            window.location.href = "pages/contacto.html";
        </script>
        <?php
    }

    $stmt->close();
    $conn->close();
}
?>