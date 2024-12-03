<?php
include "./send_mail.php";

$nombre = addslashes($_POST['nombre']);
$correo = addslashes($_POST['email']);
$telefono = addslashes($_POST['celular']);
$mensaje = addslashes($_POST['comentarios']);

contactanos($nombre, $correo, $telefono, $mensaje);
session_start();
$_SESSION['icon'] = "success";
$_SESSION['titulo'] = "¡Correo enviado!";
$_SESSION['sms'] = "El correo fue enviado, nos pondremos en conctacto con usted lo mas pronto posible.";
$url = "../landing_page/Landing_page.php";
header("Location: " . $url);
exit();
