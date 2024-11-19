<?php 
require './seguridad.php';
require "./conexion.php";
$id = addslashes($_GET['id']);
$id_empleado = addslashes($_GET['empleado']);

// Eliminar la cita en lugar de actualizar su estado
$cancelar = "UPDATE citas SET estado = 'Cancelado', id_empleado = '$id_empleado', hora = null WHERE id_cita = '$id' ";
$query = mysqli_query($conectar, $cancelar);

if ($query) {
    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Cancelado!";
    $_SESSION['sms'] = "Cita cancelada, el horario quedo libre.";
    header("location:../paginas/mostrar_citas.php");
    exit();
} else {
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se cancelo la cita!";
    $_SESSION['sms'] = "Error: ". mysqli_error($conectar);
    echo '<script> window.history.go(-1); </script>';
    exit();
}
?>
