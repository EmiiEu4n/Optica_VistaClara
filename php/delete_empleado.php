<?php 
// require './seguridad.php';
require "conexion.php";
//get de origen
$origen = isset($_GET['origen']) ? $_GET['origen'] : "";
$id = $_GET['id'];
if($id != "1"){

    $delete = "DELETE FROM empleados WHERE id_empleado = '$id'";
    $query  = mysqli_query($conectar, $delete);
    
    if($query){
        if($origen == "usuarios"){
            header( "location: ../paginas/mostrar_usuarios.php");
        }else{
            header( "location: ../paginas/mostrar_empleados.php");
        }
    }else{
        echo "ERROR: NO se pudo eliminar el usuario con id: [ ".$id." ]";
    }
}else{
    echo '<script>
        alert("No se puede eliminar este usuario.")
        location.href="../paginas/mostrar_empleados.php";
    </script>';
}
?>