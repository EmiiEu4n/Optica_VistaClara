<?php 
// require './seguridad.php';
require "conexion.php";

$id = $_GET['id'];

$delete = "DELETE FROM citas WHERE id_cita = '$id'";
$query  = mysqli_query($conectar, $delete);

if($query){
    header( "location: ../paginas/mostrar_citas.php");
}else{
    echo "ERROR: NO se pudo eliminar la cita con id: [ ".$id." ]";
}
?>