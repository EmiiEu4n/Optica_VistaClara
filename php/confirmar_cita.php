<?php 
require './seguridad.php';
require "./conexion.php";
$id = addslashes($_GET['id']);
$id_empleado = addslashes($_GET['empleado']);

// echo $id. "----";
// echo $id_empleado;

// exit();

$actualizar = "UPDATE citas SET estado = 'Terminado', id_empleado = '$id_empleado', hora = null WHERE id_cita = '$id' ";
$query = mysqli_query($conectar, $actualizar);


if ($query) {
    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Confirmado!";
    $_SESSION['sms'] = "Se confirmo la asistencia del cliente a la cita";
    echo '<script> window.history.go(-1); </script>';
    exit();
} else {
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se pudo confirmar la cita!";
    $_SESSION['sms'] = "Error: ". mysqli_error($conectar);
    echo '<script> window.history.go(-1); </script>';
    exit();
}
?>