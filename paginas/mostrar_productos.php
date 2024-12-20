<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de productos</title>
</head>

<body>
  <?php include "menu_panel.php";
  include "../php/notificaciones.php";

  //Notificaciones
  if (isset($_SESSION["icon"])) {
    notify();
  } ?>

  <!-- Menú del panel -->
  <div class="usuarios-content main-content">
    <div class="titulo">
      <h3>TABLA DE PRODUCTOS</h3>
    </div>
    <div class="opciones-btn">
      <div class="btn-nuevo-producto btn">
        <a href="registrar_producto.php">Nuevo producto</a>
      </div>
      <div class="btn-nuevo-producto btn">
        <a href="mostrar_categoria.php">Categoría</a>
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
      <?php
      require "../php/conexion.php";
      $todos_datos = "SELECT * FROM productos ORDER BY  id_producto ASC";

      $resultado = mysqli_query($conectar, $todos_datos);

      while ($fila = mysqli_fetch_assoc($resultado)) {
      ?>
        <tr>
          <td><?php echo "$fila[id_producto]" . "<br>"; ?></td>
          <td><?php echo "$fila[nombre]" . "<br>"; ?></td>
          <td><?php echo "$" . "$fila[precio]" . "<br>"; ?></td>
          <td><?php echo "$fila[descripcion]" . "<br>"; ?></td>
          <td class="btn-ver"> <a href="../paginas/ver_producto.php?origen=productos&id=<?php echo $fila['id_producto']; ?>"><img src="../imagenes/ojo.png" alt=""></a></td>

          <td class="btn-editar"> <a href="../paginas/editar_producto.php?origen=productos&id=<?php echo $fila['id_producto']; ?>"><img src="../imagenes/edit.png" alt=""></a></td>

          <td class="btn-eliminar"><a href="#" onclick="validar('../php/delete_producto.php?id=<?php echo $fila['id_producto']; ?>&url=<?php echo $fila['img']; ?>')"> <img src="../imagenes/borrar.png" alt=""> </a>
          </td>
        </tr>

        <script>
        function validar(url, username) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¿Estás seguro que deseas ELIMINAR el producto?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#c8c8c8",
                cancelButtonColor: "#151e2d",
                confirmButtonText: "Sí, eliminar producto",
                cancelButtonText: "No, mantener"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
      <?php
      }
      ?>
    </table>
  </div>

</body>

</html>