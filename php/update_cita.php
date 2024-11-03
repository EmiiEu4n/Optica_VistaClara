<?php
include "conexion.php";

// Captura y escapa de los datos del formulario
$id = addslashes($_POST['id_cita']);
$fecha = addslashes($_POST['fecha']);
$hora = addslashes($_POST['hora']);
$motivo = addslashes($_POST['motivo']);
$nombre_cliente = addslashes($_POST['nombre_cliente']);

// Verificar si ya existe otra cita en la misma fecha y hora
$verificar_cita = mysqli_query($conectar, "SELECT * FROM citas WHERE fecha = '$fecha' AND hora = '$hora' AND id_cita != '$id'");

if (mysqli_num_rows($verificar_cita) > 0) {
    echo '
    <script>
    alert("Ya existe una cita registrada en esa fecha y hora.");
    window.history.go(-1);
    </script>
    ';
    exit();
}

// Actualizar los datos en la tabla 'citas'
$update = "UPDATE citas SET fecha = '$fecha', hora = '$hora', motivo = '$motivo', nombre_cliente = '$nombre_cliente' WHERE id_cita = '$id'";

$query = mysqli_query($conectar, $update);

if ($query) {
    echo '
    <script>
        alert("Se actualizo la cita");
        location.href="../paginas/mostrar_citas.php?id='.$id.'";
    </script>
    ';
} else {
    echo '
    <script>
        alert("NO SE GUARDO EN LA BASE DE DATOS");
        location.href="../paginas/editar_cita.php?id='.$id.'";
    </script>
    ';
}
?>
