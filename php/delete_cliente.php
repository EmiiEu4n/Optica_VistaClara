<?php 
// require './seguridad.php';
require "conexion.php";

$id = $_GET['id'];
//get de origen
$origen = isset($_GET['origen']) ? $_GET['origen'] : "";

$delete = "DELETE FROM clientes WHERE id_cliente = '$id'";
$query  = mysqli_query($conectar, $delete);

if($query){
    if($origen == "usuarios"){
        header( "location: ../paginas/mostrar_usuarios.php");
    }else{
        header( "location: ../paginas/mostrar_clientes.php");
    }
}else{
    echo "ERROR: NO se pudo eliminar el usuario con id: [ ".$id." ]";
}
?>