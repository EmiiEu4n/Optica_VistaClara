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
    //get de origen
    $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
    // instruccion
    $producto = "SELECT * FROM clientes WHERE id_cliente = '$id'";
    // consulta
    $query = mysqli_query($conectar, $producto);

    $info = $query->fetch_array();
    ?>
    <div class="ver-producto-content main-content">
        <div class="titulo">
            <h3>Cliente: <span><?php echo $info['apellidos'] . " " . $info['nombres'] ?></span></h3>
        </div>


        <div class="content-info">
            <div class="info formulario">
                <!-- informacion del cliente -->
                <fieldset disabled = "disable">
                    <legend>Información de personal</legend>
                    <!-- Nombres -->
                    <label for="">Nombre:</label>
                    <input value="<?php echo $info['nombres'] ?>" type="text">

                    <!-- apellidos -->
                    <label for="">Apellidos:</label>
                    <input value="<?php echo $info['apellidos'] ?>" type="text">

                    <!-- domicilio -->
                    <label for="">Domicilio:</label>
                    <input value="<?php echo $info['direccion'] ?>" type="text">

                </fieldset>
                <fieldset disabled = "disable">
                    <legend>Información de contacto</legend>
                    <!-- telefono -->
                    <label for="">Telefono:</label>
                    <input value="<?php echo $info['telefono'] ?>" type="text">

                    <!-- correo -->
                    <label for="">Correo:</label>
                    <input value="<?php echo $info['correo'] ?>" type="text">

                </fieldset>
                <fieldset disabled = "disable">
                    <legend>Información médica</legend>
                    <!-- preescripcion -->
                    <label for="">Preescripcion:</label><br>
                    <textarea disabled><?php echo $info['preescripcion'] ?></textarea><br>
                    <!-- Dar de alta -->
                    <label for="">Verificado:</label>
                    <input value="<?php echo $info['verificado'] ?>" type="text">

                </fieldset>
            </div>

        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="<?php echo ($origen =='usuarios')?'./mostrar_usuarios.php' : './mostrar_clientes.php'?>">Regresar</a>
            </div>
            <div class="btn">
                <a href="./editar_cliente.php?origen=<?php echo $origen ?>ver&id=<?php echo $id ?>">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>