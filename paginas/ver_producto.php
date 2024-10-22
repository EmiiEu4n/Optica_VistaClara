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
            <!-- ---Lo usamos para extraer la información de la BD----- -->
             <?php
            require "../php/conexion.php";
          $id = $_GET['id'];
          $ver_usuario = "SELECT * FROM productos WHERE id_producto = '$id'";
          $resultado = mysqli_query($conectar, $ver_usuario);

          $fila = $resultado->fetch_array();
        //   echo $fila ["nombre"];
          ?>
            <div class="info formulario">
                <!-- informacion del producto -->
                <fieldset>
                    <legend>Información del producto</legend>
                    <!-- Nombres -->
                    <label for="">Nombre:</label>
                    <p class="letra"><?php echo "$fila[nombre]"."&nbsp"?></p>
                    <br></br>
                    <!-- Categoria -->
                    <label for="">Categoría:</label>
                    <p class="letra"><?php echo "$fila[id_categoria]"."&nbsp"?></p>
                    <br></br>
                    <!-- Precio -->
                    <label for="">Precio:</label>
                    <p class="letra"><?php echo "$fila[precio]"."&nbsp"?></p>
                    <br></br>
                    <!-- Descripción -->
                    <label for="">Descripción:</label>
                    <p class="letra"><?php echo "$fila[descripcion]"."&nbsp"?></p>
                    <br></br>
                    <!-- Nombres -->
                    <label for="">Stock:</label>
                    <p class="letra"><?php echo "$fila[stock]"."&nbsp"?></p>
                    <br></br>
                    <!-- Proveedor -->
                    <label for="">Proveedor:</label>
                    <p class="letra"><?php echo "$fila[id_proveedor]"."&nbsp"?></p>
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