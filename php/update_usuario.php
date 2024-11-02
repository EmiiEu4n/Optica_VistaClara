<?php
require "conexion.php";
$id = $_POST['id_usuario'];
$nombre = addslashes($_POST['nombre']);
$apellido = addslashes($_POST['apellido']);
$rol = addslashes($_POST['rol']);
$correo = addslashes($_POST['correo']);
$telefono = addslashes($_POST['telefono']);

// ------xxxxx----
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

$actualizar = "UPDATE usuarios SET usuario = '$usuario', contrasenia = '$contrasenia', cargo = '$cargo' WHERE id = '$id'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
  <script>
    alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
    location.href="ver_usuario.php?id='.$id.'";
  </script>
  ';
  } else {
    echo '
  <script>
    alert("NO SE GUARDO EN LA BASE DE DATOS");
    location.href="editar_usuario.php?id='.$id.'";
  </script>
  ';
  }