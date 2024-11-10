<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
        <!-- Encabezado -->

        <?php include "Encabezado.php"; ?>

        <!-- Ver un lente -->
        <div class="contenedor8">
        <?php
          require "../php/conexion.php";
          $id = $_GET['id'];
          $ver_usuario = "SELECT * FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE id_producto = '$id'";
          $resultado = mysqli_query($conectar, $ver_usuario);

          $fila = $resultado->fetch_array();
        //   echo $fila ["nombre"];
          ?>
          <!-- Iiria la foto -->
            <div class="caja8 espacio2">
            <a href="<?php echo $fila['img'] ?>" target="_blank"><img class="fotoven" src="<?php echo $fila['img'] ?>" alt=""></a>
            </div>
            <!-- Información del producto -->
            <div class="caja8 espacio">
          
                        <p class="letra text2"><?php echo "$fila[nombre_categoria]". " "."$fila[nombre]"."&nbsp" ?></p>
                        <br>
                        <p class="letra text3"><?php echo "$"."$fila[precio]"."&nbsp"?></p>
                        <br>
                        <p class="letra"><?php echo "$fila[descripcion]"."&nbsp"?></p>
                        
            </div>

        </div>
    <!-- Pie de página -->
    <?php include "Piedepagina.php"; ?>
</body>
</html>