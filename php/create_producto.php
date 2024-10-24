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
    echo '
    <script>
     alert("Este producto ya ha sido registrado")
     location.href="../paginas/registrar_usuario.php";
    </script>
 ';
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
    echo '
<script>
alert("Es demasiado pesada la foto del producto");
window.history.go(-1);
</script>
';
}

//Valida el tipo de foto y lo guardar en la ruta destino /productos
if ($tipofoto == "image/webp" or $tipofoto == "image/jpeg" or $tipofoto == "image/png" or $tipofoto == "image/gif" or $tipofoto == "image/jpg" or $nombreImagen == "") {
    move_uploaded_file($rutaTemporal, $rutaDestino);
    //Guardar datos en la base de datios
    $insert  = "INSERT INTO  productos (nombre, id_categoria, precio, descripcion, stock, id_proveedor, img) VALUE('$nombre', '$id_categoria', '$precio','$descripcion', '$stock','$id_proveedor','$rutaDestino')";
    $query = mysqli_query($conectar, $insert);
} else {
    echo '
<script>
alert("Error: Tipo de imagen no soportado");
window.history.go(-1);
</script>
';
    exit();
}

if ($query) {
    echo '
    <script>
    alert("Se guardo correctamente el nuevo producto");
    location.href="../paginas/mostrar_productos.php";
    </script>
    ';
} else {
    echo '
<script>
alert("ERROR: NO se guardo el nuevo producto");
location.href="../paginas/mostrar_productos.php";
</script>
';
}

exit();

//Busca la id con la que se guardo
// $buscar = "SELECT id FROM productos WHERE rutafoto = '$rutaDestino' LIMIT 1";
// $query = mysqli_query($conectar, $buscar);
// $fila = $query->fetch_array();

// if ($query) {
//     echo '
// <script>
// alert("SE GUARDARO EL POST CORRECTAMENTE");
// location.href="/ver_producto.php?id=' . $fila['id'] . ' ";
// </script>
// ';
// } else {
//     echo '
// <script>
// alert("NO SE GUARDO EL POST");
// location.href="/login/pages/mostrar_noticias.php";
// </script>
// ';
// }
