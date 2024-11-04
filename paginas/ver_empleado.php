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
    //get de origen
    $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
    require "../php/conexion.php";
    $id = $_GET['id'];
    if($id == 1){
        header("Location: ../paginas/mostrar_empleados.php"); 
    }

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
                <fieldset disabled = "disable">
                    <legend>Información personal</legend>
                    <!-- Nombres -->
                    <label for="">Nombre:</label>
                    <input value="<?php echo $info['nombres'] ?>" type="text">
                    <!-- apellidos -->
                    <label for="">Apellidos:</label>
                    <input value="<?php echo $info['apellidos'] ?>" type="text">
                    <!-- domicilio -->
                    <label for="">Domicilio:</label><br>
                    <textarea disabled><?php echo $info['direccion'] ?></textarea>
                </fieldset>

                <fieldset disabled = "disable">
                    <legend>Información de contacto</legend>
                    <!-- correo -->
                    <label for="">Correo:</label>
                    <input value="<?php echo $info['correo'] ?>" type="text">

                    <!-- telefono -->
                    <label for="">Telefono:</label>
                    <input value="<?php echo $info['telefono'] ?>" type="text">

                </fieldset>
                <fieldset disabled = "disable">
                    <legend>Información de empleo</legend>
                    <!-- username-->
                    <label for="">Username:</label>
                    <input value="<?php echo $info['usuario'] ?>" type="text">

                    <!-- Rol-->
                    <label for="">Rol:</label>
                    <input value="<?php echo $info['rol'] ?>" type="text">

                    <!-- Fecha de contratacion-->
                    <label for="">Fecha de contrato:</label>
                    <input value="<?php echo $info['fecha_contratacion'] ?>" type="text">

                </fieldset>
            </div>
        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="<?php echo ($origen =='usuarios')?'./mostrar_usuarios.php' : './mostrar_empleados.php'?>">Regresar</a>
            </div>
            <div class="btn">
                <a href="./editar_empleado.php?origen=<?php echo $origen ?>ver&id=<?php echo $id ?>">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>