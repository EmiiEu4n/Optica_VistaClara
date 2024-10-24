<?php
require "conexion.php";

$id = $_GET['id'];

$borrar = "DELETE FROM productos WHERE id_producto = '$id' ";

$resultado = mysqli_query($conectar, $borrar);
