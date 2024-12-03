<?php
require('./plantilla_pdf.php');
require('./conexion.php');
// Inicializar variables
$nombre = isset($_GET['busca_nombre']) ? $_GET['busca_nombre'] : "";
$estadoSeleccionado = isset($_GET['filtro_estado']) ? $_GET['filtro_estado'] : "";
$ordenFecha = isset($_GET['orden_fecha']) ? $_GET['orden_fecha'] : 'ASC';

// Consulta inicial
$datos = "SELECT ci.id_cita,  concat(cl.nombres, ' ',cl.apellidos) as nombre_cliente, ci.fecha_cita, ci.hora, ci.estado, ci.motivo 
              FROM citas ci 
              INNER JOIN clientes cl ON ci.id_cliente = cl.id_cliente 
              WHERE 1=1";

// Filtro por nombre
if ($nombre) {
    $datos .= " AND cl.nombres LIKE '%$nombre%'";
}

// Filtro por estado
if ($estadoSeleccionado) {
    $datos .= " AND ci.estado = '$estadoSeleccionado'";
}

// Ordenamiento por fecha
$datos .= " ORDER BY ci.fecha_cita $ordenFecha, ci.hora ASC";

// Realizar consulta
$result = mysqli_query($conectar, $datos);

// Crear instancia de la clase PDF
$pdf = new PDF();
// Datos
$header = array('Cliente', 'Fecha', 'Hora', 'Motivo de cita');
$data = array();
// Recorrer los resultados y agregar a $data
while ($row = $result->fetch_assoc()) {
    $fecha_formateada = date("j M, Y", strtotime($row['fecha_cita']));
    $hora_formateada = ($row['hora'] != "") ? date("g:i A", strtotime($row['hora'])) : "N/D";
    // Añadir cada fila como un array dentro del array principal
    $data[] = array(
        $row['nombre_cliente'],
        $fecha_formateada,
        $hora_formateada,
        $row['motivo']
    );
}

$pdf->AddPage();

// Generar la tabla con encabezados y datos
$pdf->TablaCitas($header, $data);

// Salida del archivo
$pdf->Output();
