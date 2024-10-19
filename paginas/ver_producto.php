<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver producto</title>
</head>

<body>
    <?php include "menu_panel.php" ?>

    <div class="ver-producto-content main-content">
        <div class="titulo">
            <h3>Producto: <span></h3>
        </div>


        <div class="content-info">
            <div class="info formulario">
                <!-- informacion del producto -->
                <fieldset>
                    <legend>Información del producto</legend>
                    <!-- Nombres -->
                    <label for="">Nombre:</label>
                    <br></br>
                    <!-- Categoria -->
                    <label for="">Categoría:</label>
                    <br></br>
                    <!-- Precio -->
                    <label for="">Precio:</label>
                    <br></br>
                    <!-- Descripción -->
                    <label for="">Descripción:</label>
                    <br></br>
                    <!-- Nombres -->
                    <label for="">Stock:</label>
                    <br></br>
                    <!-- Proveedor -->
                    <label for="">Proveedor:</label>
                    <br></br>

                </fieldset>
            </div>

        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="./mostrar_productos.php">Regresar</a>
            </div>
            <div class="btn">
                <a href="./editar_producto.php?id=<?php echo $id ?>">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>