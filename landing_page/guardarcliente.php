<?php
require "../php/conexion.php";

$correo = addslashes($_POST['correo']);
$contrasena = addslashes($_POST['contrasena']);


// Verificar
$veridicar_usuario = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

if (mysqli_num_rows($veridicar_usuario) > 0) {
  echo '
  <script>
    alert("ESTE AUTOR YA ESTA REGISTRADO");
    location.href="registrar_cliente_2.php";
  </script> ';
  exit;
}

$insertar = "INSERT INTO clientes (correo, contrasena) VALUES ('$correo', '$contrasena')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
  <script>
    alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
    location.href="Verficar_IS.php";
  </script>
  ';
  } else {
    echo '
  <script>
    alert("NO SE GUARDO EN LA BASE DE DATOS");
    location.href="registrar_cliente_2.php";
  </script>
  ';
  }