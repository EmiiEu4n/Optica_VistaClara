<?php 
// require './seguridad.php';
include "conexion.php";

$nombre = addslashes($_POST['nombre']);
$contacto = addslashes($_POST['contacto']);
$correo = addslashes($_POST['correo']);
$telefono = addslashes($_POST['telefono']);
$direccion = addslashes($_POST['direccion']);

// echo $nombre."<br>";
// echo $contacto."<br>";
// echo $correo."<br>";
// echo $telefono."<br>";
// echo $direccion."<br>";
// exit();
//Verificar el correo
$verificar_empresa = mysqli_query($conectar, "SELECT * FROM proveedores WHERE nombre = '$nombre'");

if(mysqli_num_rows($verificar_empresa)){
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro la empresa!";
    $_SESSION['sms'] = "La empresa ingresada ($nombre) ya esta dado de alta en el sistema.";
    echo '<script> window.history.go(-1); </script>';
    exit(); 
}


//Guardar datos en la base de datos
$insert  = "INSERT INTO  proveedores (nombre, contacto, correo, telefono, direccion) VALUE('$nombre', '$contacto','$correo','$telefono', 'direccion')";

$query = mysqli_query($conectar, $insert);

if($query){
    session_start();
    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Empresa registrada!";
    $_SESSION['sms'] = "Se registro una nueva empresa en el sistema.";
    header("location:../paginas/mostrar_proveedores.php");
    exit();
}else{
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro los datos de la empresa!";
    $_SESSION['sms'] = "Error: ". mysqli_error($conectar);
    echo '<script> window.history.go(-1); </script>';
}

?>