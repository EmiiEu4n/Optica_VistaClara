<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver producto</title>
</head>

<body>
    <?php include "menu_panel.php";
    if ($_SESSION['rol'] != 'Administrador') {
        header("Location: ../paginas/dashboard.php");
    }
    require "../php/conexion.php";
    $id = $_GET['id'];

    // instruccion
    $producto = "SELECT * FROM empleados WHERE id_empleado = '$id'";
    // consulta
    $query = mysqli_query($conectar, $producto);

    $info = $query->fetch_array();
    ?>
    <div class="ver-producto-content main-content">
        <div class="titulo">
            <h3>Empleado: <span><?php echo $info['nombres'] . " " . $info['apellidos'] ?></span></h3>
        </div>


        <div class="content-info">
            <div class="info formulario">
                <!-- informacion del cliente -->
                <fieldset>
                    <legend>Información personal</legend>
                    <!-- Nombres -->
                    <label for="">Nombre:</label>
                    <p><?php echo $info['nombres'] ?></p>
                    <!-- apellidos -->
                    <label for="">Apellidos:</label>
                    <p><?php echo $info['apellidos'] ?></p>
                    <!-- domicilio -->
                    <label for="">Domicilio:</label><br>
                    <textarea disabled><?php echo $info['direccion'] ?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Información de contacto</legend>
                    <!-- correo -->
                    <label for="">Correo:</label>
                    <p><?php echo $info['correo'] ?></p>
                    <!-- telefono -->
                    <label for="">Telefono:</label>
                    <p><?php echo $info['telefono'] ?></p>
                </fieldset>
                <fieldset>
                    <legend>Información de empleo</legend>
                    <!-- username-->
                    <label for="">Username:</label>
                    <p><?php echo $info['usuario'] ?></p>
                    <!-- Rol-->
                    <label for="">Rol:</label>
                    <p><?php echo $info['rol'] ?></p>
                    <!-- Fecha de contratacion-->
                    <label for="">Fecha de contrato:</label>
                    <p><?php echo $info['fecha_contratacion'] ?></p>
                </fieldset>


            </div>

        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="./mostrar_empleados.php">Regresar</a>
            </div>
            <div class="btn">
                <a href="./editar_empleado.php?id=<?php echo $id ?>">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>