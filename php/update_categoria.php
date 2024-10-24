<?php
require "conexion.php";

$id = $_POST['id_categoria'];
$nombrecategoria = addslashes($_POST['nombre_categoria']);

$verificar_categoria = mysqli_query($conectar, "SELECT * FROM categorias WHERE nombre_categoria = '$nombrecategoria'");
if(mysqli_num_rows($verificar_categoria)){
  echo '
  <script>
  alert("Esta categoría [ '.$nombrecategoria.' ] ya esta registrado.")
  window.history.go(-1);
  </script>
  ';
  exit();
}

$actualizar = "UPDATE categorias SET nombre_categoria = '$nombrecategoria' WHERE id_categoria = '$id'";
$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
  <script>
    alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
    location.href="../paginas/ver_categoria.php?id='.$id.'";
  </script>
  ';
  } else {
    echo '
  <script>
    alert("NO SE GUARDO EN LA BASE DE DATOS");
    location.href="../paginas/editar_categoria.php?id='.$id.'";
  </script>
  ';
  }