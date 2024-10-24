<?php
require "conexion.php";

$id = $_GET['id'];

$borrar = "DELETE FROM categorias WHERE id_categoria = '$id' ";

$resultado = mysqli_query($conectar, $borrar);
if ($resultado) {
  echo '<script>
  alert("SE ELIMINO CORRECTAMENTE");
  location.href="../paginas/mostrar_categoria.php";
</script>';
}
