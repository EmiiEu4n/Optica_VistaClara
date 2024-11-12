<?php
// require './seguridad.php';
include "conexion.php";
include "./send_mail.php";

$origen = isset($_GET['origen']) ? $_GET['origen'] : "";

$nombres = addslashes($_POST['nombres']);
$correo = addslashes($_POST['correo']);
$apellidos = addslashes($_POST['apellidos']);
$telefono = addslashes($_POST['telefono']);
$direccion = addslashes($_POST['direccion']);
$contrasena = isset($_POST['contrasena'])? addslashes($_POST['contrasena']):"";
$preescripcion = isset($_POST['preescripcion'])? addslashes($_POST['preescripcion']):"";
$correo_contrasena = 'False';


// echo $nombres."<br>";
// echo $apellidos."<br>";
// echo $correo."<br>";
// echo $telefono."<br>";
// echo $direccion."<br>";
// echo $contrasena."<br>";
// echo $preescripcion."<br>";
// exit();

//verificar correo en clientes
$verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

if (mysqli_num_rows($verificar_correo)) {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡Registro fallido!";
    $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un usuario.";
    echo '<script> window.history.go(-1); </script>';
    exit(); 
}

//verificar correo en empleados
$verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");

if (mysqli_num_rows($verificar_correo)) {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡Registro fallido!";
    $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un usuario.";
    echo '<script> window.history.go(-1); </script>';
    exit();
}

if (empty($contrasena)) {
    // echo "Esta vacia"; exit();
    $contrasena = generarPassword();
    $correo_contrasena = 'True';
}
// else{
//     echo "No esta vacia"; exit();
// }

//Contraseña encriptada
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

//Guardar datos en la base de datos
$insert  = "INSERT INTO  clientes (nombres, apellidos, correo, telefono, direccion, preescripcion, rol, verificado, contrasena) VALUE('$nombres', '$apellidos','$correo','$telefono','$direccion','$preescripcion', 'Cliente', 'False', '$contrasena_encriptada')";

$query = mysqli_query($conectar, $insert);


if ($query) {

    if ($correo_contrasena == 'True') {
        
        welcome_pass($correo, $nombres, $contrasena);
        session_start();
        $_SESSION['icon'] = "success";
        $_SESSION['titulo'] = "¡Registrado!";
        $_SESSION['sms'] = "Se registro un nuevo cliente y se le envio un correo con sus credenciales de acceso.";
        header("location:../paginas/mostrar_clientes.php");
        exit();
    } else { //Contraseña por el cliente
        welcome($correo, $nombres);
        session_start();
        $_SESSION['icon'] = "success";
        $_SESSION['titulo'] = "¡Registrado!";
        $_SESSION['sms'] = "Registro completado, puedes iniciar sesion.";
        echo '<script> window.history.go(-1); </script>';
        // echo '<script>
        //     alert("Los datos se registraron correctamente")
        //     window.history.go(-1);
        // </script>';
    }
} else {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡Registro fallido!";
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
