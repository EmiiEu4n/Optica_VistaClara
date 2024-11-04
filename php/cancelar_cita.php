<?php 
require './seguridad.php';
require "./conexion.php";
$id = addslashes($_GET['id']);

// Eliminar la cita en lugar de actualizar su estado
$eliminar = "DELETE FROM citas WHERE id_cita = '$id'";
$query = mysqli_query($conectar, $eliminar);

if ($query) {
    echo '<script>
        alert("Cita cancelada y eliminada");
        location.href="../paginas/mostrar_citas.php";
    </script>';
} else {
    echo '<script>
        alert("Error al eliminar la cita");
        window.history.go(-1);
    </script>';
}
?>
