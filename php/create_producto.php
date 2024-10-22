<?php
require "conexion.php";

$nombre = addslashes($_POST['nombre']);
$categoria = addslashes($_POST['id_categoria']);
$precio = addslashes($_POST['precio']);
$descripcion = addslashes($_POST['descripcion']);
$stock = addslashes($_POST['stock']);
$id_proveedor = addslashes($_POST['id_proveedor']);


$insertar = "INSERT INTO productos (nombre, id_categoria, precio, descripcion, stock, id_proveedor) VALUES ('$nombre','$categoria', '$precio', '$descripcion', '$stock', '$id_proveedor')";
$query = mysqli_query($conectar, $insertar);
if ($query) {
echo '
<script>
alert("SE GUARDARO EL PRODUCTO CORRECTAMENTE");
location.href="../paginas/mostrar_productos.php";
</script>
';
} else {
echo '
<script>
alert("NO SE GUARDO EL POST");
location.href="../paginas/registrar_producto.php";
</script>
';
}