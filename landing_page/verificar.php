<?php
require "../php/conexion.php";

// Limpiar y validar inputs
$email = addslashes($_POST['correo']);
$contrasena = addslashes($_POST['contrasena']);

// Consulta preparada para mayor seguridad
$comparar = "SELECT * FROM clientes WHERE correo = ? LIMIT 1";

// Preparar la sentencia
$stmt = mysqli_prepare($conectar, $comparar);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

// Obtener resultado
$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_array($resultado);

    // Verificar contraseña hasheada
    if (password_verify($contrasena, $fila["contrasena"])) {
        session_start();
        $_SESSION["username"] = $email;
        $_SESSION["autentificar"] = "SI";
        
        // Redirigir al panel administrativo
        header("Location: ../paginas/portal_cliente.php");
        exit();
    } else {
        // Credenciales incorrectas
        header("Location: index.php?errorusuario=SI");
        exit();
    }
} else {
    // Usuario no encontrado
    header("Location: index.php?errorusuario=SI");
    exit();
}

// Liberar recursos
mysqli_stmt_close($stmt);
mysqli_close($conectar);
?>
