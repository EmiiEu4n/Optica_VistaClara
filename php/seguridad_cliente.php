<?php
session_start();
require '../php/tiempo_sesion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['cliente_autentificado']) || $_SESSION['cliente_autentificado'] != "SI") {
    // Si no está autenticado, redirigir al login
    header("Location: ../index.php");
    exit();
}
?>
