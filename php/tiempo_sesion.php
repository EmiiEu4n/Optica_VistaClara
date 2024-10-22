<?php 
// Verificar si la cookie de sesión existe
if (isset($_COOKIE['sesion_iniciada'])) {
    
    // Comprobar si la cookie ha expirado
    if (time() > $_COOKIE['sesion_iniciada']) {
        // Si la cookie ha expirado, destruir sesión y cookie, y redirigir al login
        session_unset();
        session_destroy();
        setcookie("sesion_iniciada", "", time() - 36000, "/");
        header("Location: ../index.php");
        exit();
    } else {
        // Si la cookie no ha expirado, actualizar la cookie con un nuevo tiempo de expiración
        setcookie("sesion_iniciada", time() + $_SESSION["tiempo_expiracion"], time() + $_SESSION["tiempo_expiracion"], "/");
    }
} else {
    // Si no existe la cookie, destruir la sesión y redirigir al login
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}
?>