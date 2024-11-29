<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver cita</title>
    <link rel="stylesheet" href="../landing_page/estilos_landing.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .tabla-citas {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tabla-citas th, 
        .tabla-citas td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .tabla-citas th {
            background-color: #333;
            color: white;
            text-align: center;
        }

        .tabla-citas tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .tabla-citas tr:hover {
            background-color: #f1f1f1;
        }

        .estado {
            font-weight: bold;
            padding: 5px 8px;
            border-radius: 5px;
            text-align: center;
        }

        .estado.proxima {
            color: white;
            background-color: #4caf50;
        }

        .estado.pasada {
            color: white;
            background-color: #f44336;
        }

        .acciones a {
            text-decoration: none;
            padding: 8px 12px;
            margin: 0 5px;
            border-radius: 4px;
            color: white;
            font-size: 14px;
        }

        .acciones .detalle {
            background-color: #007bff;
        }

        .acciones .cancelar {
            background-color: #dc3545;
        }

        .acciones a:hover {
            opacity: 0.9;
        }
    </style>
</head>
</head>
<body>
<?php include "../landing_page/Encabezado.php"; ?>

    <div class="container">
        <br><br><br>
        <h1>Resumen de Citas</h1>

        <!-- Tabla de citas próximas -->
        <h2>Citas Próximas</h2>
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
                <tr>
                    <td>30 Nov, 2024</td>
                    <td>Consulta médica</td>
                    <td><span class="estado proxima">Próxima</span></td>
                    <td class="acciones">
                        <a href="#" class="detalle">Detalles</a>
                        <a href="#" class="cancelar">Cancelar</a>
                    </td>
                </tr>
                <tr>
                    <td>02 Dic, 2024</td>
                    <td>Revisión dental</td>
                    <td><span class="estado proxima">Próxima</span></td>
                    <td class="acciones">
                        <a href="#" class="detalle">Detalles</a>
                        <a href="#" class="cancelar">Cancelar</a>
                    </td>
                </tr>
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
                <tr>
                    <td>20 Nov, 2024</td>
                    <td>Consulta de seguimiento</td>
                    <td><span class="estado pasada">Pasada</span></td>
                    <td class="acciones">
                        <a href="#" class="detalle">Detalles</a>
                    </td>
                </tr>
                <tr>
                    <td>15 Nov, 2024</td>
                    <td>Examen físico</td>
                    <td><span class="estado pasada">Pasada</span></td>
                    <td class="acciones">
                        <a href="#" class="detalle">Detalles</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>