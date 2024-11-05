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
          $ver_usuario = "SELECT * FROM productos WHERE id_producto = '$id'";
          $resultado = mysqli_query($conectar, $ver_usuario);

          $fila = $resultado->fetch_array();
        //   echo $fila ["nombre"];
          ?>
          <!-- Iiria la foto -->
            <div class="caja8">
            <a href="<?php echo $fila['img'] ?>" target="_blank"><img class="fotopromo" src="<?php echo $fila['img'] ?>" alt=""></a>
            </div>
            <!-- Información del producto -->
            <div class="caja8">
          
                        <p class="letra"><?php echo "$fila[nombre]"."&nbsp" ?></p>
                        <hr>
                        <br>
                      
                        <p class="letra"><?php echo "$fila[id_categoria]"."&nbsp" ?></p>
                        <hr><br>
                       
                        <p class="letra"><?php echo "$fila[precio]"."&nbsp"?></p>
                  
                        <p class="letra"><?php echo "$fila[descripcion]"."&nbsp"?></p>
                        <hr>
                        <hr>
            </div>

        </div>
    <!-- Pie de página -->
    <?php include "Piedepagina.php"; ?>
</body>
</html>