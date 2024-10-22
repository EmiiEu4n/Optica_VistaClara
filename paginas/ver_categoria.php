<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver categoría</title>
</head>

<body>
    <?php include "menu_panel.php" ?>

    <div class="ver-producto-content main-content">
        <div class="titulo">
            <h3>Categoría: <span></h3>
        </div>


        <div class="content-info">
            <div class="info formulario">
                <!-- informacion del producto -->
                <fieldset>
                    <legend>Información de la categoría</legend>
                    <!-- Nombres -->
                    <label for="">Nombre:</label>
                </fieldset>
            </div>

        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="./mostrar_categoria.php">Regresar</a>
            </div>
            <div class="btn">
                <a href="./editar_categoria.php?id=<?php echo $id ?>">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>