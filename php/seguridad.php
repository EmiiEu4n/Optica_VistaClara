<?php
session_start();
require '../php/tiempo_sesion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['autentificado']) || $_SESSION['autentificado'] != "SI") {
    // Si no está autenticado, redirigir al login
    header("Location: ../index.php");
    exit();
}else if($_SESSION['rol'] == 'Cliente'){
    header("Location: ../paginas/portal_cliente.php");
}
?>
