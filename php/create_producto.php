<?php
require './seguridad.php';
include "conexion.php";

$nombre = addslashes($_POST['nombre']);
$id_categoria = addslashes($_POST['id_categoria']);
$precio = addslashes($_POST['precio']);
$descripcion = addslashes($_POST['descripcion']);
$stock = addslashes($_POST['stock']);
$id_proveedor = addslashes($_POST['id_proveedor']);

// echo $nombre . "<br>";
// echo $id_categoria . "<br>";
// echo $precio . "<br>";
// echo $descripcion . "<br>";
// echo $stock . "<br>";
// echo $id_proveedor . "<br>";
// exit();

// verificar producto
$verificar_producto = mysqli_query($conectar, "SELECT * FROM productos WHERE nombre = '$nombre'");

if (mysqli_num_rows($verificar_producto)) {
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro el producto!";
    $_SESSION['sms'] = "El producto ingresada ($nombre) ya esta dado de alta en el sistema.";
    echo '<script> window.history.go(-1); </script>';
    exit();
}

// Datos de la foto
$rutaEnServidor = '../productos';
$rutaTemporal = $_FILES['imagen']['tmp_name'];
$nombreImagen = $_FILES['imagen']['name'];

// Evita la sobreescritura de las imagenes 
date_default_timezone_set('UTC');
$nombreimagenunica = date('Y-m-d-h-i-s') . "-" . $nombreImagen;

$rutaDestino = $rutaEnServidor . "/" . $nombreimagenunica;

// validacion del peso de la imagen
$pesofoto = $_FILES['imagen']['size'];
$tipofoto = $_FILES['imagen']['type'];

if ($pesofoto > 900000) {
    $_SESSION['icon'] = "info";
    $_SESSION['titulo'] = "¡Excede el límite!";
    $_SESSION['sms'] = "El tamaño de la imagen supera el límite permitido y no se puede guardar.";
    echo '<script> window.history.go(-1); </script>';
    exit();
}

//Valida el tipo de foto y lo guardar en la ruta destino /productos
if ($tipofoto == "image/webp" or $tipofoto == "image/jpeg" or $tipofoto == "image/png" or $tipofoto == "image/gif" or $tipofoto == "image/jpg" or $nombreImagen == "") {
    move_uploaded_file($rutaTemporal, $rutaDestino);
    //Guardar datos en la base de datios
    $insert  = "INSERT INTO  productos (nombre, id_categoria, precio, descripcion, stock, id_proveedor, img) VALUE('$nombre', '$id_categoria', '$precio','$descripcion', '$stock','$id_proveedor','$rutaDestino')";
    $query = mysqli_query($conectar, $insert);
} else {
    $_SESSION['icon'] = "info";
    $_SESSION['titulo'] = "¡Formato no compatible!";
    $_SESSION['sms'] = "El formato de la imagen no es valido, no se puede guardar.";
    echo '<script> window.history.go(-1); </script>';
    exit();
}

if ($query) {

    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Producto registrado!";
    $_SESSION['sms'] = "Se registro un nuevo producto en el sistema.";
    header("location:../paginas/mostrar_productos.php");
    exit();
} else {

    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro el producto!";
    $_SESSION['sms'] = "Error: " . mysqli_error($conectar);
    echo '<script> window.history.go(-1); </script>';
}
exit();
