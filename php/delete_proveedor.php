<?php 
// require './seguridad.php';
require "conexion.php";

$id = $_GET['id'];

$delete = "DELETE FROM proveedores WHERE id_proveedor = '$id'";
$query  = mysqli_query($conectar, $delete);

if($query){
    header( "location: ../paginas/mostrar_proveedores.php");
}else{
    echo "ERROR: NO se pudo eliminar el proveedor con id: [ ".$id." ]";
}
?>