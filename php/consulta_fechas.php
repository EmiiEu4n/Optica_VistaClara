<?php
include './conexion.php';

// Obtener fechas llenas
$sqlLlenas = "SELECT fecha_cita FROM citas GROUP BY fecha_cita HAVING COUNT(*) > 15";
$resultLlenas = $conectar->query($sqlLlenas);

// Verificar si la consulta fue exitosa
if (!$resultLlenas) {
    die(json_encode(['error' => 'Error en la consulta de fechas llenas: ' . $conectar->error]));
}

// Extraer las fechas llenas y formatearlas en un array
$fechasLlenas = array_map(function($fecha) {
    return date('Y-m-d', strtotime($fecha['fecha_cita']));
}, $resultLlenas->fetch_all(MYSQLI_ASSOC));

// Retornar la lista de fechas llenas en formato JSON
header('Content-Type: application/json');
echo json_encode([
    'fechasLlenas' => $fechasLlenas,
]);

// Cerrar la conexión a la base de datos
$conectar->close();
?>
