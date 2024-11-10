<?php
require "conexion.php";

$id = $_POST['id_categoria'];
$nombrecategoria = addslashes($_POST['nombre_categoria']);

$verificar_categoria = mysqli_query($conectar, "SELECT * FROM categorias WHERE nombre_categoria = '$nombrecategoria'");
if (mysqli_num_rows($verificar_categoria)) {
  session_start();
  $_SESSION['icon'] = "error";
  $_SESSION['titulo'] = "¡NO se registro la categoría!";
  $_SESSION['sms'] = "La categoría ingresada ($nombrecategoria) ya esta dado de alta en el sistema.";
  echo '<script> window.history.go(-1); </script>';
  exit();
}

$actualizar = "UPDATE categorias SET nombre_categoria = '$nombrecategoria' WHERE id_categoria = '$id'";
$query = mysqli_query($conectar, $actualizar);

if ($query) {
  session_start();
  $_SESSION['icon'] = "success";
  $_SESSION['titulo'] = "¡Categoría actualizada!";
  $_SESSION['sms'] = "Se actualizo la categoría en el sistema.";
  header("location:../paginas/mostrar_categoria.php");
  exit();

} else {
  session_start();
  $_SESSION['icon'] = "error";
  $_SESSION['titulo'] = "¡NO se actualizo la categoría!";
  $_SESSION['sms'] = "Error: ". mysqli_error($conectar);
  echo '<script> window.history.go(-1); </script>';
}
