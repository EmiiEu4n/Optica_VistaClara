<?php
include "conexion.php";

// Captura y escapa de los datos del formulario
$fecha = addslashes($_POST['fecha']);
$hora = addslashes($_POST['hora']);
$motivo = addslashes($_POST['motivo']);
$nombre_cliente = addslashes($_POST['nombre_cliente']);

// Insertar los datos en la tabla 'citas'
$insert = "INSERT INTO citas (fecha, hora, motivo, nombre_cliente) VALUES ('$fecha', '$hora', '$motivo', '$nombre_cliente')";

$query = mysqli_query($conectar, $insert);

if ($query) {
    echo '<script>
    alert("La cita se agendó correctamente.")
    location.href="../paginas/registrar_cita.php";
    </script>';
} else {
    echo '<script>
    alert("ERROR: Fallo al registrar la cita en la base de datos.");
    window.history.go(-1);
    </script>';
}
?>
