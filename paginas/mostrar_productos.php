<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de productos</title>
</head>

<body>
    <?php include "menu_panel.php" ?>

    <!-- Menú del panel -->
    <div class="usuarios-content main-content">
        <div class="titulo">
            <h3>TABLA DE PRODUCTOS</h3>
        </div>
        <div class="opciones-btn">
            <div class="btn-nuevo-producto btn">
                <a href="registrar_producto.php">Nuevo producto</a>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <!-- <th>CATEGORIA</th> -->
                <th>PRECIO</th>
                <th>DESCRIPCIÓN</th>
                <!-- <th>STOCK</th>
                <th>PROVEEDOR</th> -->
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
            <!-- Producto de ejemplo -->
             <!-- ---- Solo es poner los nombres correspondientes de la otra tabla y listo --- -->
              <!-- Pero si queires eliminar lo que puse, comienza de aqui abajo -->
            <?php  //<---- de aquí
          require "conexion.php";
          $todos_datos = "SELECT * FROM producto INNER JOIN autor ON producto.autor = autor.id_autor INNER JOIN carreras ON libros.carrera = carreras.id_carreras";

          $resultado = mysqli_query($conectar, $todos_datos);

          while ($fila = $resultado->fetch_array()) {
          ?>
            <tr>
              <td><?php echo "$fila[id]" . "<br>"; ?></td>
              <td><?php echo "$fila[nombre]" . "<br>"; ?></td>
              <td><?php echo "$fila[precio]" . "<br>"; ?></td>
              <td><?php echo "$fila[descripcion]" . "<br>"; ?></td>
              <td> <a href="ver_producto.php?id=<?php echo $fila['id_libro'];?>">
              <img class="foto1" src="../imagenes/ojo.png" alt="">
              </a></td>
              <td> <a href="editar_producto.php?id=<?php echo $fila['id_libro'];?>"><img class="foto1" src="../imagenes/edit.png" alt="">
              </a></td>



              <td class="eliminar"> <a href="#" onclick="validar('../php/delete_producto.php?id=<?php echo $fila['id_libro']; ?>')"> 
                <div class="foto_eliminar">
                  <img src="../imagenes/borrar.png" alt="">
                </div>
            </a></td>
            </tr>

            <script>
              function validar(url) {
                var eliminar = confirm("Realmente desea ELIMINAR el registro ??");
                if (eliminar == true) {
                  window.location = url;
                }
              }
            </script>
          <?php
          }
          ?>
          <!-- ------Hasta Aqui---- -->
        </table> 
    </div>

</body>

</html>
