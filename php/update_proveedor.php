<?php
// require './seguridad.php';
include "conexion.php";
$id = addslashes($_POST['id']);

//informacion de antigua
$resultado = $conectar->QUERY("SELECT nombre FROM proveedores WHERE id_proveedor = '$id'");
$empresa_antigua = mysqli_fetch_assoc($resultado);

//informacion nueva
$nombre = addslashes($_POST['nombre']);
$contacto = addslashes($_POST['contacto']);
$correo = addslashes($_POST['correo']);
$telefono = addslashes($_POST['telefono']);
$direccion = addslashes($_POST['direccion']);

// echo $empresa_antigua['nombre']."<br>";
// echo $nombre."<br>";
// echo $contacto."<br>";
// echo $correo."<br>";
// echo $telefono."<br>";
// echo $direccion."<br>";
// exit();
//Verificar el correo

if ($nombre != $empresa_antigua['nombre']) {

    $verificar_empresa = mysqli_query($conectar, "SELECT * FROM proveedores WHERE nombre = '$nombre'");

    if (mysqli_num_rows($verificar_empresa)) {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se registro la empresa!";
        $_SESSION['sms'] = "La empresa ingresada ($nombre) ya esta dado de alta en el sistema.";
        echo '<script> window.history.go(-1); </script>';
        exit(); 
    }


    //Actualizar datos en la base de datos
    $actualizar  = "UPDATE proveedores SET  nombre = '$nombre', contacto = '$contacto', correo = '$correo', telefono = '$telefono', direccion = '$direccion' WHERE id_proveedor = '$id'";
    $query = mysqli_query($conectar, $actualizar);

} else {

    //Actualizar datos en la base de datos
    $actualizar  = "UPDATE proveedores SET  contacto = '$contacto', correo = '$correo', telefono = '$telefono', direccion = '$direccion' WHERE id_proveedor = '$id'";
    $query = mysqli_query($conectar, $actualizar);
}



if ($query) {
    session_start();
    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Actualizado!";
    $_SESSION['sms'] = "Se actualizó los datos de la empresa $nombre exitosamente";

    // Construir la URL de redirección correctamente
    $url = "../paginas/ver_proveedor.php?id=" . $id;
    header("Location: " . $url);
    exit(); // Asegúrate de salir después de redirigir

} else {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se actualizo los datos de la empresa!";
    $_SESSION['sms'] = "Error: ". mysqli_error($conectar);
    echo '<script> window.history.go(-1); </script>';
}
