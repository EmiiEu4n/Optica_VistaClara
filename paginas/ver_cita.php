<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver producto</title>
</head>

<body>

    <?php include "menu_panel.php";
    require "../php/conexion.php";
    $id = $_GET['id'];

    // instruccion
    $producto = "SELECT * FROM citas WHERE id_cita = '$id'";
    // consulta
    $query = mysqli_query($conectar, $producto);

    $info = $query->fetch_array();
    ?>
    <div class="ver-producto-content main-content">



        <div class="content-info">
            <div class="info formulario">
                <!-- informacion del cliente -->
                <fieldset>
                    <legend>Información de la cita</legend>

                    <label for="">Nombre del cliente</label>
                    <p><?php echo $info['nombre_cliente'] ?></p>

                    <label for="">Día de la cita:</label>
                    <p><?php echo $info['fecha'] ?></p>

                    <label for="">Hora de la cita:</label>
                    <p><?php echo $info['hora'] ?></p>

                    <label for="">Motivo:</label>
                    <p><?php echo $info['motivo'] ?></p>
                </fieldset>

            </div>

        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="./mostrar_citas.php">Regresar</a>
            </div>
            <div class="btn">
                <a href="./editar_cita.php?id=<?php echo $id ?>">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>