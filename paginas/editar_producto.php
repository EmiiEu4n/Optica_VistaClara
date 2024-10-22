<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
</head>

<body>
    <?php include "menu_panel.php"; ?>
    <!-- Manteniendo el menú si es necesario -->
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>EDITAR PRODUCTO</h3>
        </div>
        <!-- -----Para poder estrar de la BD ----- -->
        <?php
          require "../php/conexion.php";
          $id = $_GET['id'];
          $ver_usuario = "SELECT * FROM productos WHERE id_producto = '$id'";
          $resultado = mysqli_query($conectar, $ver_usuario);

          $fila = $resultado->fetch_array();
        //   echo $fila ["nombre"];
          ?>
        <div class="content-info">
            <div class="content-registrar formulario">
                <form action="../php/update_producto.php" method="post">
                    <fieldset>
                        <legend>Información del producto</legend>
                        <!-- Nombre -->
                        <label for="">Nombre(s)<span>*</span></label><br>
                        <input required name="nombre" type="text" placeholder="Nombre" value="<?php echo "$fila[nombre]" ?>"><br><br>
                        
                        <!-- Precio -->
                        <label for="">Precio<span>*</span></label><br>
                        <input required name="precio" type="text" placeholder="" value="<?php echo "$fila[precio]" ?>"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Detalles del producto</legend>
                        <!-- Descripción -->
                        <label for="">Descripción<span>*</span></label><br>
                        <textarea name="descripcion" rows="3" placeholder="" value=""><?php echo "$fila[descripcion]" ?></textarea><br><br>

                        <!-- Stock (solo permite números) -->
                        <label for="stock">Stock<span>*</span></label><br>
                        <input required name="stock" type="number" min="0" placeholder="" value="<?php echo "$fila[stock]" ?>"><br><br>

                     
                    </fieldset>

                    <!-- Botones -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_productos.php">Regresar</a>
                        </div>
                        <input type="hidden" name="id_producto" value="<?php echo "$fila[id_producto]" ?>">
                        <button class="btn-form" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
