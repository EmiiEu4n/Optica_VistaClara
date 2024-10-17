<?php 
// require './seguridad.php';
require "conexion.php";

$id = $_GET['id'];

$delete = "DELETE FROM clientes WHERE id_cliente = '$id'";
$query  = mysqli_query($conectar, $delete);

if($query){
    header( "location: ../paginas/mostrar_clientes.php");
}else{
    echo "ERROR: NO se pudo eliminar el usuario con id: [ ".$id." ]";
}
?>