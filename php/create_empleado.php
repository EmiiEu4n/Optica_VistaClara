<?php
// require './seguridad.php';
include "conexion.php";
include "./send_mail.php";

$nombres = addslashes($_POST['nombres']);
$apellidos = addslashes($_POST['apellidos']);
$telefono = addslashes($_POST['telefono']);
$correo = addslashes($_POST['correo']);
$direccion = addslashes($_POST['direccion']);
$rol = addslashes($_POST['rol']);
$fecha = addslashes($_POST['fecha']);
$username = addslashes($_POST['username']);
//prueba eliminar despues de aplicar verificacion de contraseñas
// $contrasena = addslashes($_POST['contrasena']);

// echo $nombres."<br>";
// echo $apellidos."<br>";
// echo $telefono."<br>";
// echo $correo."<br>";
// echo $direccion."<br>";
// echo $rol."<br>";
// echo $fecha."<br>";
// echo $username."<br>";
// echo $contrasena."<br>";
// exit();

//Verificar el correo
$verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");

if (mysqli_num_rows($verificar_correo)) {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro el empleado!";
    $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un empleado o administrador del sistema.";
    echo '<script> window.history.go(-1); </script>';
    exit();
}

//Verificar el correo en tabla clientes
$verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

if (mysqli_num_rows($verificar_correo)) {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro el empleado!";
    $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un cliente del sistema.";
    echo '<script> window.history.go(-1); </script>';
    exit(); 
}

//verificar el username
$verificar_username = mysqli_query($conectar, "SELECT * FROM empleados WHERE usuario = '$username'");

if (mysqli_num_rows($verificar_username)) {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro el empleado!";
    $_SESSION['sms'] = "El username ingresado ($username) ya esta siendo ocupado por un empleado del sistema.";
    echo '<script> window.history.go(-1); </script>';
    exit(); 
}
//Generar contraseña
$contrasena = generarPassword();
//Contraseña encriptada
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

//Guardar datos en la base de datos
$insert  = "INSERT INTO  empleados (nombres, apellidos,telefono, correo, direccion, rol, fecha_contratacion, usuario, contrasena) VALUE('$nombres', '$apellidos','$telefono','$correo','$direccion','$rol', '$fecha','$username','$contrasena_encriptada')";

$query = mysqli_query($conectar, $insert);

if ($query) {
    welcome_worker($correo, $username, $nombres, $contrasena);
    session_start();
    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Empleado registrado!";
    $_SESSION['sms'] = "Se registro un nuevo empleado y se le envio un correo con sus credenciales de acceso.";
    header("location:../paginas/mostrar_empleados.php");
    exit();
} else {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro el cliente!";
    $_SESSION['sms'] = "Error: ". mysqli_error($conectar);
    echo '<script> window.history.go(-1); </script>';
}

//funciones 
function generarPassword($longitud = 10)
{
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitudCaracteres = strlen($caracteres);
    $password = '';
    for ($i = 0; $i < $longitud; $i++) {
        $password .= $caracteres[rand(0, $longitudCaracteres - 1)];
    }
    return $password;
}