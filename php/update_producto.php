<?php
require "conexion.php";

$id = $_POST['id_producto'];
$nombre = addslashes($_POST['nombre']);
// $categoria = addslashes($_POST['id_categoria']);
$precio = addslashes($_POST['precio']);
$descripcion = addslashes($_POST['descripcion']);
$stock = addslashes($_POST['stock']);
// $id_proveedor = addslashes($_POST['id_proveedor']);
// $libre = addslashes($_POST['libre']);




$actualizar = "UPDATE productos SET nombre = '$nombre', precio = '$precio', descripcion = '$descripcion', stock = '$stock' WHERE id_producto = '$id'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
  <script>
    alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
    location.href="../paginas/mostrar_productos.php?id='.$id.'";
  </script>
  ';
  } else {
    echo '
  <script>
    alert("NO SE GUARDO EN LA BASE DE DATOS");
    location.href="../paginas/editar_producto.php?id='.$id.'";
  </script>
  ';
  }