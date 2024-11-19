<?php
include "conexion.php";
include "./send_mail.php";

$origen = isset($_GET['origen']) ? $_GET['origen'] : "";

// Captura y escapa de los datos del formulario
$id_cliente = addslashes($_POST['id-cliente']);
$fecha = addslashes($_POST['fecha']);
$hora = addslashes($_POST['hora']);
$motivo = addslashes($_POST['motivo']);

$sql = "SELECT correo, nombres FROM clientes WHERE id_cliente = '$id_cliente'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();

//formatear fechas
$fecha_formateada = date("j M, Y", strtotime($fecha));
$hora_formateada = date("g:i A", strtotime($hora));
$correo = $row['correo'];
$nombre = $row['nombres'];


// echo $id_cliente . "<br>";
// echo $fecha . "<br>";
// echo $hora . "<br>";
// echo $motivo . "<br>";
// echo $fecha_formateada . "<br>";
// echo $hora_formateada . "<br>";
// echo $correo . "<br>";
// // echo '
// //     <script>
// //         window.history.go(-1);
// //     </script>
// // ';
// exit();
// Verificar si ya existe una cita con la misma fecha y hora
$checkQuery = "SELECT * FROM citas WHERE fecha_cita = '$fecha' AND hora = '$hora'";

//verifica la fecha hora y si no es el mismo cliente
// $checkQuery = "SELECT * FROM citas WHERE (fecha_cita = '$fecha' AND hora = '$hora') OR id_cliente ='$id_cliente'";
$result = mysqli_query($conectar, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    // Ya existe una cita en esa fecha y hora
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro la cita!";
    $_SESSION['sms'] = "Error: Ya existe una cita registrada en esa fecha y hora";
    echo '<script> window.history.go(-1); </script>';
} else {
    // Insertar los datos en la tabla 'citas' si no existe ninguna cita en la misma fecha y hora
    $insert = "INSERT INTO citas (id_cliente, fecha_cita, hora, motivo, estado) VALUES ('$id_cliente', '$fecha', '$hora', '$motivo', 'Pendiente')";

    if (mysqli_query($conectar, $insert)) {
        confirm_cita($correo, $nombre, $hora_formateada, $fecha_formateada, $motivo);
        if ($origen == "clientes") {
            session_start();
            $_SESSION['icon'] = "success";
            $_SESSION['titulo'] = "¡Cita registrada!";
            $_SESSION['sms'] = "Se registro una nueva cita. Fecha: $fecha_formateada, Hora: $hora_formateada";
            header("location:../paginas/portal_cliente.php");
        } else {
            session_start();
            $_SESSION['icon'] = "success";
            $_SESSION['titulo'] = "¡Cita registrada!";
            $_SESSION['sms'] = "Se registro una nueva cita. Fecha: $fecha_formateada, Hora: $hora_formateada";
            header("location:../paginas/mostrar_citas.php");
        }
    } else {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se registro la cita!";
        $_SESSION['sms'] = "Error: " . mysqli_error($conectar);
        echo '<script> window.history.go(-1); </script>';
    }
}
