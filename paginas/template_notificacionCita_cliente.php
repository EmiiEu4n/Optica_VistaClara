<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Cambio en la Cita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333333;
            text-align: center;
        }

        p {
            color: #555555;
            line-height: 1.6;
        }

        .cita-detalles {
            margin: 20px 0;
            padding: 15px;
            background-color: #f4f4f4;
            border-left: 4px solid #007bff;
            border-radius: 4px;
        }

        .cita-detalles p {
            margin: 5px 0;
        }

        .btn {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h2>Notificación de Cambio en la Cita</h2>
        <p>Estimado/a [@Cliente],</p>
        <p>Queremos informarle que los datos de su cita han sido actualizados. Por favor, revise los detalles a continuación:</p>

        <div class="cita-detalles">
            <p><strong>Fecha:</strong> [Nueva Fecha]</p>
            <p><strong>Hora:</strong> [Nueva Hora]</p>
            <p><strong>Motivo:</strong> [Motivo de la Cita]</p>
            <p><strong>Estado:</strong> [Estado de la Cita]</p>
        </div>

        <p>Si tiene alguna duda o necesita realizar algún cambio adicional, no dude en ponerse en contacto con nosotros.</p>
        <a href="[Enlace de Confirmación o Detalles]" class="btn">Ver Detalles</a>

        <footer>
            Este es un mensaje automático, por favor no responda a este correo.
        </footer>
    </div>
</body>

</html>
