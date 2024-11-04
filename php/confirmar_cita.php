<?php 
require './seguridad.php';
require "./conexion.php";
$id = addslashes($_GET['id']);
$id_empleado = addslashes($_GET['empleado']);

// echo $id. "----";
// echo $id_empleado;

// exit();

$actualizar = "UPDATE citas SET estado = 'Terminado', id_empleado = '$id_empleado' WHERE id_cita = '$id' ";
$query = mysqli_query($conectar, $actualizar);

echo '<script>
alert("Cita confirmada");
window.history.go (-1);
</script>'
?>