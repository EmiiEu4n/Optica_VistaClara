<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver cita</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto';
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 750px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        h2 {
            color: #3498db;
            font-size: 1.8rem;
            margin-bottom: 15px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }

        .tabla-citas {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 1rem;
        }

        .tabla-citas th,
        .tabla-citas td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .tabla-citas th {
            background-color: #3498db;
            color: white;
            text-align: center;
            font-weight: bold;
        }

        .tabla-citas td {
            color: #333;
            background-color: #fff;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .tabla-citas tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .tabla-citas tr:hover {
            background-color: #f1f1f1;
        }

        .estado {
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 30px;
            display: inline-block;
            color: white;
        }

        .estado.proxima {
            background-color: #4caf50;
        }

        .estado.pasada {
            background-color: #f44336;
        }

        .acciones a {
            text-decoration: none;
            padding: 8px 15px;
            margin: 0 5px;
            border-radius: 5px;
            color: white;
            font-size: 0.9rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }

        .acciones .detalle {
            background-color: #3498db;
        }

        .acciones .cancelar {
            background-color: #e74c3c;
        }

        .acciones a:hover {
            opacity: 0.85;
            transform: translateY(-3px);
        }

        /* Estilo para el botón de regresar */
        .btn-regresar {
            display: inline-block;
            background-color: #e67e22;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: bold;
        }

        .btn-regresar:hover {
            background-color: #d35400;
            transform: translateY(-2px);
        }

        /* Responsividad */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.6rem;
            }

            .tabla-citas th,
            .tabla-citas td {
                font-size: 0.9rem;
                padding: 10px;
            }

            .btn-regresar {
                padding: 8px 15px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
                margin: 20px 5px;

            }

            h1 {
                font-size: 1.8rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .tabla-citas th,
            .tabla-citas td {
                font-size: 0.8rem;
                padding: 8px;
            }

            .acciones a {
                margin: 5px;
                padding: 6px 10px;
                font-size: 0.8rem;
            }

            .btn-regresar {
                padding: 6px 12px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <?php
    include "../php/conexion.php";
    $id = $_SESSION['id_cliente'];
    $sql = "SELECT ci.id_cita, concat(cl.nombres, ' ',cl.apellidos) as nombre_cliente, ci.fecha_cita, ci.hora, ci.estado, ci.motivo 
    FROM citas ci 
    INNER JOIN clientes cl ON ci.id_cliente = cl.id_cliente  WHERE ci.id_cliente = $id AND ci.estado = 'Pendiente'";
    $result = mysqli_query($conectar, $sql);
    ?>
    <div class="container">
        <!-- Botón de regresar -->
        <a href="./portal_cliente.php" class="btn-regresar">← Regresar</a>

        <h1>Resumen de Citas</h1>

        <!-- Tabla de citas próximas -->
        <h2>Citas programadas</h2>
        <table class="tabla-citas">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows < 1) {
                    echo '<tr><td colspan="7">No existen citas programadas...</td></tr>';
                } else {
                    while ($row = $result->fetch_assoc()) {
                        $fecha_formateada = date("j M, Y", strtotime($row['fecha_cita']));
                        $hora_formateada = ($row['hora'] != "") ? date("g:i A", strtotime($row['hora'])) : "N/D";
                ?>
                        <tr>
                            <td><?php echo $fecha_formateada ?></td>
                            <td><?php echo $hora_formateada ?></td>
                            <td><?php echo $row['motivo'] ?></td>
                            <td><span class="estado proxima"><?php echo $row['estado'] ?></span></td>
                            <td class="acciones">
                                <a href="#" class="detalle">Detalles</a>
                                <a href="#" class="cancelar">Cancelar</a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <br>
        <!-- Tabla de citas pasadas -->
        <h2>Citas Pasadas</h2>
        <table class="tabla-citas">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT ci.id_cita, concat(cl.nombres, ' ',cl.apellidos) as nombre_cliente, ci.fecha_cita, ci.hora, ci.estado, ci.motivo 
                FROM citas ci 
                INNER JOIN clientes cl ON ci.id_cliente = cl.id_cliente  WHERE ci.id_cliente = $id AND (ci.estado = 'Cancelado' OR ci.estado = 'Terminado')";
                    $result = mysqli_query($conectar, $sql);
                    
                if ($result->num_rows < 1) {
                    echo '<tr><td colspan="7">No hay resultados...</td></tr>';
                } else {
                    while ($table2 = $result->fetch_assoc()) {
                        $fecha_formateada = date("j M, Y", strtotime($table2['fecha_cita']));
                ?>
                        <tr>
                            <td><?php echo $fecha_formateada ?></td>
                            <td><?php echo $table2['motivo'] ?></td>
                            <td><span class="estado pasada"><?php echo $table2['estado'] ?></span></td>
                            <td class="acciones">
                                <a href="#" class="detalle">Detalles</a>
                            </td>
                        </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>