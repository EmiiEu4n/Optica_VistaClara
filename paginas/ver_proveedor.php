<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver producto</title>
</head>

<body>
    <?php 
    include "menu_panel.php";
    require "../php/conexion.php";
    $id = $_GET['id'];
    //get de origen
    $origen = isset($_GET['origen']) ? $_GET['origen'] : "";

        $query = "SELECT * FROM proveedores WHERE id_proveedor = '$id'";
        $resultado = mysqli_query($conectar, $query);

        $info_prov = $resultado -> fetch_array();
    ?>
    <div class="ver-producto-content main-content">
        <div class="titulo">
            <h3>Proveedor: <?php echo $info_prov['nombre']?></h3>
        </div>


        <div class="content-info">
            <div class="info formulario">
                <!-- informacion de la empresa -->
                <fieldset>
                    <legend>Información de la empresa</legend>
                    <!-- Nombre -->
                    <label for="">Nombre:</label>
                    <p><?php echo $info_prov['nombre']?></p>
                    <!-- Dirección -->
                    <label for="">Dirección:</label><br>
                    <textarea disabled><?php echo $info_prov['direccion']?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Información del trabajador</legend>
                    <label for="">Nombre:</label>
                    <p><?php echo $info_prov['contacto']?></p>
                    <!-- correo -->
                    <label for="">Correo electronico:</label>
                    <p><?php echo $info_prov['correo']?></p>
                    <!-- telefono -->
                    <label for="">Teléfono:</label>
                    <p><?php echo $info_prov['telefono']?></p>
                </fieldset>
            </div>

        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="./mostrar_proveedores.php">Regresar</a>
            </div>
            <div class="btn">
                <a href="../paginas/editar_proveedor.php?origen=<?php echo $origen ?>ver&id=<?php echo $id; ?>">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>