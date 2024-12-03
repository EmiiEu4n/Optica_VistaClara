<?php
require "./seguridad.php";
require "./conexion.php";

$id = $_GET['id'];
$urlproducto = $_GET['url'];

$borrar = "DELETE FROM productos WHERE id_producto = '$id' ";

$resultado = mysqli_query($conectar, $borrar);
if ($resultado) {
  // Borramos la antigua imagen con el metodo unlink. Revisamos si existe y que no esta vacia la variable.
  if (file_exists($urlproducto) && !empty($urlproducto)) {
    // Eliminamos la imagen
    if (!unlink($urlproducto)) {
      echo '<script>alert("Error: Hubo un error al intentar eliminar la imagen");window.history.go(-1);</script>';
    }
  }
  echo '<script>
    location.href="../paginas/mostrar_productos.php";
  </script>';
}
