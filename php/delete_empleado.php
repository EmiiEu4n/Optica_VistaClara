<?php 
// require './seguridad.php';
require "conexion.php";

$id = $_GET['id'];

$delete = "DELETE FROM empleados WHERE id_empleado = '$id'";
$query  = mysqli_query($conectar, $delete);

if($query){
    header( "location: ../paginas/mostrar_empleados.php");
}else{
    echo "ERROR: NO se pudo eliminar el usuario con id: [ ".$id." ]";
}
?>