<?php
include "./conexion.php";
// Captura y escapa de los datos del formulario
$id = addslashes($_POST['id_cita']);

// Antigua información
$resultado = $conectar->QUERY("SELECT hora, fecha_cita, motivo FROM citas WHERE id_cita = '$id'");
$cita = $resultado->fetch_array();
$antigua_fecha = $cita['fecha_cita'];
$antiguo_motivo = $cita['motivo'];

// Nueva información
$fecha = addslashes($_POST['fecha']);
$motivo = addslashes($_POST['motivo']);
$hora = isset($_POST['hora']) ? addslashes($_POST['hora']) : ''; // Asigna a una variable con verificación

if ($fecha != $antigua_fecha || (!empty($hora) && $hora != $cita['hora'])) {
    // Verificar si ya existe otra cita en la misma fecha y hora
    $checkQuery = "SELECT * FROM citas WHERE fecha_cita = '$fecha' AND hora = '$hora'";
    $result = mysqli_query($conectar, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Ya existe una cita en esa fecha y hora
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se registro la cita!";
        $_SESSION['sms'] = "Error: Ya existe una cita registrada en esa fecha y hora";
        echo '<script> window.history.go(-1); </script>';
        exit();
    } else {
        // Actualizar los datos en la tabla 'citas'
        $update = "UPDATE citas SET fecha_cita = '$fecha', hora = '$hora', motivo = '$motivo' WHERE id_cita = '$id'";

        if (mysqli_query($conectar, $update)) {
            session_start();
            $_SESSION['icon'] = "success";
            $_SESSION['titulo'] = "¡Actualizado!";
            $_SESSION['sms'] = "Se actualizo la cita exitosamente";
            // Construir la URL de redirección correctamente
            $url = "../paginas/ver_cita.php?origen=citas&id=" . $id;
            header("Location: " . $url);
            exit(); // Asegúrate de salir después de redirigir
        } else {
            session_start();
            $_SESSION['icon'] = "error";
            $_SESSION['titulo'] = "¡NO se actualizo la cita!";
            $_SESSION['sms'] = "Error: " . mysqli_error($conectar);
            echo '<script> window.history.go(-1); </script>';
            exit();

            // echo '
            // <script>
            //     alert("Error al registrar la cita: ' . mysqli_error($conectar) . '");
            //     location.href="../paginas/editar_cita.php?origen=citas&id=' . $id . '";
            // </script>';
        }
    }
} else if ($motivo != $antiguo_motivo) {
    $update = "UPDATE citas SET motivo = '$motivo' WHERE id_cita = '$id'";

    if (mysqli_query($conectar, $update)) {
        session_start();
        $_SESSION['icon'] = "success";
        $_SESSION['titulo'] = "¡Actualizado!";
        $_SESSION['sms'] = "Se actualizó la cita exitosamente";

        // Construir la URL de redirección correctamente
        $url = "../paginas/ver_cita.php?origen=citas&id=" . $id;
        header("Location: " . $url);
        exit(); // Asegúrate de salir después de redirigir
    } else {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se actualizo la cita!";
        $_SESSION['sms'] = "Error: " . mysqli_error($conectar);
        echo '<script> window.history.go(-1); </script>';
        exit();
    }
} else {
    session_start();
    $_SESSION['icon'] = "info";
    $_SESSION['titulo'] = "¡Sin modificaciones!";
    $_SESSION['sms'] = "No hubo cambios en los campos";
    echo '<script> window.history.go(-1); </script>';
    exit();
}
