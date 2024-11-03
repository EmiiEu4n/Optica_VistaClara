<?php
require "conexion.php";

$id = $_GET['id'];

$borrar = "DELETE FROM usuarios WHERE id = '$id' ";

$resultado = mysqli_query($conectar, $borrar);
if ($resultado) {
    echo '<script>
    location.href="../paginas/mostrar_usuarios.php";
  </script>';
  }