<?php
require "conexion.php";

$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$id_proveedor = $_POST['id_proveedor'];
$libre = $_POST['libre'];


// Datos de la foto
$rutaEnServidor = 'fotos';
$rutaTemporal = $_FILES['imagen']['tmp_name'];
$nombreImagen = $_FILES['imagen']['name'];

// para que no se sobreescriban los nombres de fotos
date_default_timezone_set('UTC');
$nombreimagenunico = date("Y-m-d-h-i-s") . "-" . $nombreImagen;

$rutaDestino = $rutaEnServidor . "/" . $nombreimagenunico;

// validacion del peso de la imagen
$pesofoto = $_FILES['imagen']['size'];
$tipofoto = $_FILES['imagen']['type'];

if ($pesofoto > 900000) {
echo '
<script>
alert("Es demasiado pesada la foto");
window.history.go(-1);
</script>
';
exit;
}

if ($tipofoto == "image/jpeg" or $tipofoto == "image/png" or $tipofoto == "image/gif" or $tipofoto == "image/jpg" or $nombreImagen == "") {

move_uploaded_file($rutaTemporal, $rutaDestino);
} else {
echo '
<script>
alert("No es una IMAGEN");
window.history.go(-1);
</script>
';
exit;
}

$insertar = "INSERT INTO producto (nombre, categoria, precio, descripcion, stock, id_proveedor, libre, ruta) VALUES ('$nombre','$categoria', '$precio', '$descripcion', '$stock', '$id_proveedor', '$libre', '$rutaDestino')";
$query = mysqli_query($conectar, $insertar);
if ($query) {
echo '
<script>
alert("SE GUARDARO EL PRODUCTO CORRECTAMENTE");
location.href="ver_producto.php";
</script>
';
} else {
echo '
<script>
alert("NO SE GUARDO EL POST");
location.href="registrar_producto.php";
</script>
';
}