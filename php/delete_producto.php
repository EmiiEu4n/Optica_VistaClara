<?php
require "conexion.php";

$id = $_GET['id'];

$borrar = "DELETE FROM producto WHERE id = '$id' ";

$resultado = mysqli_query($conectar, $borrar);
if ($resultado) {
  echo '<script>
  alert("SE ELIMINO CORRECTAMENTE");
  location.href="Mostrar_producto.php";
</script>';
}
