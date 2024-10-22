<?php
require "../php/conexion.php"; // Incluye el archivo de conexión a la base de datos

// Comprobar si la tabla empleados está vacía
$query = "SELECT COUNT(*) AS total FROM empleados";
$resultado = $conectar->query($query);
$fila = $resultado->fetch_assoc();

if ($fila['total'] == 0) {
    // Si no hay usuarios, crear un usuario administrador temporal
    $username = 'DevSociety';
    $email = 'emilianoeuan155@gmail.com';
    $contrasena = 'root';
    $rol = 'Administrador';
    $password_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    $insert_query = "INSERT INTO empleados (usuario, correo, rol, contrasena) VALUES (?, ?, ?, ?)";
    $stmt = $conectar->prepare($insert_query);
    $stmt->bind_param("ssss", $username, $email, $rol, $password_hash);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<script>
            alert("Usuario admin creado con éxito.")
            location.href="../index.php";
        </script>';
    } else {
        echo '<script>
            alert("Error al crear el usuario admin.")
            location.href="../index.php";
        </script>';
    }
} else {
    echo '<script>
        alert("Ya existen datos.")
        location.href="../index.php";
    </script>';
}
