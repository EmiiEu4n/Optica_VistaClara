<?php
// Conexión a la base de datos
require "./conexion.php";

// Recibe la fecha del cuerpo de la solicitud
$datos = json_decode(file_get_contents("php://input"), true);
$fecha = $datos['fecha'];

// Prepara la consulta para evitar inyecciones SQL
$sql = "SELECT hora FROM citas WHERE fecha_cita = ?";
$stmt = $conectar->prepare($sql);
$stmt->bind_param("s", $fecha);
$stmt->execute();
$result = $stmt->get_result();

$citas = [];
while ($row = $result->fetch_assoc()) {
    $citas[] = $row; // Guardamos cada fila en un array
}

$stmt->close();
$conectar->close();

// Envía la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($citas);
?>
