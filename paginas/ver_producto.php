<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver producto</title>
</head>

<body>
    <?php include "menu_panel.php";
    include "../php/notificaciones.php";

    //Notificaciones
    if (isset($_SESSION["icon"])) {
        notify();
    } ?>

    <?php
    require "../php/conexion.php";
    //get de origen
    $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
    $id = $_GET['id'];
    $ver_usuario = "SELECT productos.nombre AS producto, categorias.nombre_categoria, productos.precio, productos.descripcion, productos.stock, proveedores.nombre AS proveedor, productos.img  FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria INNER JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor WHERE id_producto = '$id'";
    $resultado = mysqli_query($conectar, $ver_usuario);

    $fila = $resultado->fetch_array();
    //   echo $fila ["nombre"];
    ?>
    <div class="ver-producto-content main-content">
        <div class="titulo">
            <h3>Producto: <span><?php echo "$fila[producto]" . "&nbsp" ?></span></h3>
        </div>


        <div class="content-info">
            <!-- ---Lo usamos para extraer la información de la BD----- -->
            <div class="info formulario">
                <!-- informacion del producto -->
                <fieldset style="width: 730px;" disabled="disable">
                    <div class="imagen-prod">
                        <img src="<?php echo "$fila[img]" ?>" alt="nada">
                    </div>
                    <legend>Imagen del producto</legend>

                </fieldset>
                <fieldset disabled="disable">
                    <legend>Información del producto</legend>
                    <!-- Nombres -->
                    <label for="">Nombre:</label>
                    <input value="<?php echo "$fila[producto]" . "&nbsp" ?>" type="text">
                    <!-- Categoria -->
                    <label for="">Categoría:</label>
                    <input type="text" value="<?php echo "$fila[nombre_categoria]" . "&nbsp" ?>">
                    <!-- Precio -->
                    <label for="">Precio:</label>
                    <input type="text" value="<?php echo "$" . "$fila[precio]" . "&nbsp" ?>">
                    <!-- Descripción -->
                    <label for="">Descripción:</label>
                    <textarea style="width: 100%;" name="" id=""><?php echo "$fila[descripcion]" . "&nbsp" ?></textarea>
                    <!-- Nombres -->
                    <!-- <label for="">Stock:</label>
                    <p class="letra"></p> -->
                    <!-- Proveedor -->
                    <label for="">Proveedor:</label>
                    <input value="<?php echo "$fila[proveedor]" . "&nbsp" ?>" type="text" name="" id="">
                    </br>

                </fieldset>

            </div>

        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="./mostrar_productos.php">Regresar</a>
            </div>
            <div class="btn">
                <a href="./editar_producto.php?origen=<?php echo $origen ?>ver&id=<?php echo $id ?>">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>