<?php
include "conexion.php";

// Captura y escapa de los datos del formulario
$id = addslashes($_POST['id_cita']);
//antigua informacion
$resultado = $conectar->QUERY("SELECT hora, fecha_cita, motivo FROM citas WHERE id_cita = '$id'");
$cita = $resultado->fetch_array();
// $antigua_hora = $cita['hora'];
$antigua_fecha = $cita['fecha_cita'];
$antiguo_motivo = $cita['motivo'];

//nueva informacion
$fecha = addslashes($_POST['fecha']);
$motivo = addslashes($_POST['motivo']);

if ($fecha != $antigua_fecha) {
    $hora = addslashes($_POST['hora']);
    // Verificar si ya existe otra cita en la misma fecha y hora
    $checkQuery = "SELECT * FROM citas WHERE fecha_cita = '$fecha' AND hora = '$hora'";
    $result = mysqli_query($conectar, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Ya existe una cita en esa fecha y hora
        echo '
        <script>
            alert("Error: Ya existe una cita registrada en esa fecha y hora.");
            window.history.go(-1);
        </script>';
        echo "";
    } else {
        // Actualizar los datos en la tabla 'citas'
        $update = "UPDATE citas SET fecha_cita = '$fecha', hora = '$hora', motivo = '$motivo' WHERE id_cita = '$id'";

        if (mysqli_query($conectar, $update)) {
            echo '
            <script>
                alert("Cita actualizada exitosamente.")
                location.href="../paginas/ver_cita.php?id=' . $id . '";
            </script>';
        } else {
            echo '
            <script>
                alert("Error al registrar la cita: ' . mysqli_error($conectar) . '");
                location.href="../paginas/editar_cita.php?id=' . $id . '";
            </script>';
        }
    }
} else if ($motivo != $antiguo_motivo) {
    $update = "UPDATE citas SET motivo = '$motivo' WHERE id_cita = '$id'";

    if (mysqli_query($conectar, $update)) {
        echo '
            <script>
                alert("Cita actualizada exitosamente.")
                location.href="../paginas/ver_cita.php?id=' . $id . '";
            </script>';
    } else {
        echo '
            <script>
                alert("Error al registrar la cita: ' . mysqli_error($conectar) . '");
                location.href="../paginas/editar_cita.php?id=' . $id . '";
            </script>';
    }
} else {
    echo '
    <script>
        alert("No hubo cambios en los campos");
        window.history.go (-1);
    </script>';
}
