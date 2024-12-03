<?php
date_default_timezone_set('America/Merida'); // Asegúrate de usar la zona horaria correcta
require './seguridad_cliente.php';
require "./conexion.php";

$id = addslashes($_GET['id']);
$date = addslashes($_GET['fecha']);
$hour = addslashes($_GET['hora']);

// Fecha y hora actuales
$fechaHoraActual = new DateTime();
// depuracion
// echo $fechaHoraActual->format('Y-m-d H:i:s');

// Fecha y hora de la cita
$fechaHoraCita = new DateTime($date . ' ' . $hour);

// depuración
// echo $fechaHoraCita->format('Y-m-d H:i:s');

// Calcular la diferencia entre las fechas y horas
$diferencia = $fechaHoraActual->diff($fechaHoraCita);

// Obtener la diferencia en días, horas y minutos
$diasDiferencia = $diferencia->days;
$horasDiferencia = $diferencia->h;
$minutosDiferencia = $diferencia->i;

// if ($fechaHoraActual < $fechaHoraCita) {
//     // Verificar si faltan 3 horas o menos 
//     if ($diasDiferencia == 0 && ($horasDiferencia < 3 || ($horasDiferencia == 3 && $minutosDiferencia == 0))) {
//         $_SESSION['icon'] = "error";
//         $_SESSION['titulo'] = "¡NO se canceló la cita!";
//         $horasDiferencia++;
//         $_SESSION['sms'] = "La hora está próxima a la cita. Faltan $horasDiferencia hora(s). Puede comunicarse al servicio al cliente.";
//         echo '<script> window.history.go(-1); </script>';
//         exit();
//     }

//     if ($diasDiferencia < 3) {
//         $_SESSION['icon'] = "error";
//         $_SESSION['titulo'] = "¡NO se canceló la cita!";
//         $diasDiferencia++;
//         $_SESSION['sms'] = "La fecha de hoy está próxima a la cita. Faltan $diasDiferencia día(s). Puede comunicarse al servicio al cliente.";
//         echo '<script> window.history.go(-1); </script>';
//         exit();
//     }
// }
// Actualizar el estado de la cita a 'Cancelado'
$cancelar = "UPDATE citas SET estado = 'Cancelado', hora = null WHERE id_cita = '$id'";
$query = mysqli_query($conectar, $cancelar);

if ($query) {
    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Cancelado!";
    $_SESSION['sms'] = "Cita cancelada, el horario quedó libre.";
    header("location:../paginas/mostrar_citas_cliente.php");
    exit();
} else {
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se canceló la cita!";
    $_SESSION['sms'] = "Error: " . mysqli_error($conectar);
    echo '<script> window.history.go(-1); </script>';
    exit();
}
