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
          $ver_usuario = "SELECT productos.nombre AS producto, categorias.nombre_categoria, productos.precio, productos.descripcion, productos.stock, proveedores.nombre AS proveedor, productos.img  FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria INNER JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor WHERE id_producto = '$id'";
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
                    <p class="letra"><?php echo "$fila[producto]"."&nbsp"?></p>
                    <!-- Categoria -->
                    <label for="">Categoría:</label>
                    <p class="letra"><?php echo "$fila[nombre_categoria]"."&nbsp"?></p>
                    <!-- Precio -->
                    <label for="">Precio:</label>
                    <p class="letra"><?php echo "$"."$fila[precio]"."&nbsp"?></p>
                    <!-- Descripción -->
                    <label for="">Descripción:</label>
                    <p class="letra"><?php echo "$fila[descripcion]"."&nbsp"?></p>
                    <!-- Nombres -->
                    <label for="">Stock:</label>
                    <p class="letra"><?php echo "$fila[stock]"."&nbsp"?></p>
                    <!-- Proveedor -->
                    <label for="">Proveedor:</label>
                    <p class="letra"><?php echo "$fila[proveedor]"."&nbsp"?></p>
                    </br>

                </fieldset>
                <fieldset>
                    <legend>Imagen del producto</legend>
                    <img style="width: 350px;" src="<?php echo "$fila[img]"?>" alt="nada">
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