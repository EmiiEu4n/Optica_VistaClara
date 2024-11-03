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
        //get de origen
        $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
        $id = $_GET['id'];
        $ver_producto = "SELECT productos.id_producto, productos.nombre AS producto, categorias.id_categoria, categorias.nombre_categoria, productos.precio, productos.descripcion, productos.stock,proveedores.id_proveedor, proveedores.nombre AS proveedor, productos.img  
          FROM productos 
          INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria INNER JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor WHERE id_producto = '$id'";
        $resultado = mysqli_query($conectar, $ver_producto);

        $info_prod = $resultado->fetch_array();
        //   echo $fila ["nombre"];
        ?>
        <div class="content-info">
            <div class="content-registrar formulario">
                <form action="../php/update_producto.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Información del producto</legend>
                        <!-- Nombre -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input required name="nombre" type="text" placeholder="Nombre" value="<?php echo $info_prod['producto'] ?>"><br><br>
                        <!-- Categoria -->
                        <label for="">Categoría<span>*</span></label><br>
                        <select required name="id_categoria">
                            <!-- Opciones de CATEGORIA -->
                            <?php
                            $resultado = $conectar->QUERY("SELECT id_categoria, nombre_categoria FROM categorias");
                            while ($fila = $resultado->fetch_array()) { ?>
                                <option
                                    value="<?php echo $fila['id_categoria'] ?>"
                                    <?php
                                    //inicio de if para seleccionar el autor
                                    if ($info_prod['id_categoria'] == $fila['id_categoria']) {
                                        echo "selected";
                                    }
                                    //fin de if
                                    ?>><?php echo $fila['nombre_categoria'] ?>
                                </option>

                            <?php }
                            mysqli_free_result($resultado);
                            ?>
                        </select><br>


                        <!-- Precio -->
                        <label for="">Precio<span>*</span></label><br>
                        <label for="">$</label><input required min="0" name="precio" type="number" placeholder="" value="<?php echo $info_prod['precio'] ?>"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Detalles del producto</legend>
                        <!-- Descripción -->
                        <label for="">Descripción<span>*</span></label><br>
                        <textarea required name="descripcion" rows="3" placeholder="Escribe una breve descripción" value=""><?php echo $info_prod['descripcion'] ?></textarea><br><br>

                        <!-- Stock (solo permite números) -->
                        <label for="stock">Stock<span>*</span></label><br>
                        <input required name="stock" type="number" min="0" placeholder="Escribe el stock disponible" value="<?php echo $info_prod['stock'] ?>"><br><br>

                        <!-- proveedor -->
                        <label for="">Proveedor<span>*</span></label><br>
                        <select required name="id_proveedor">
                            <!-- Opciones de proveedor -->
                            <?php
                            $resultado = $conectar->QUERY("SELECT id_proveedor, nombre AS proveedor FROM proveedores");
                            while ($fila = $resultado->fetch_array()) { ?>
                                <option
                                    value="<?php echo $fila['id_proveedor'] ?>"
                                    <?php
                                    //inicio de if para seleccionar el proveedor
                                    if ($info_prod['id_proveedor'] == $fila['id_proveedor']) {
                                        echo "selected";
                                    }
                                    //fin de if
                                    ?>><?php echo $fila['proveedor'] ?>
                                </option>

                            <?php }
                            mysqli_free_result($resultado);
                            ?>
                        </select><br><br>

                        <!-- Imagen del producto -->
                        <label for="">Imagen del producto</label><br>
                        <input type="file" name="imagen" id="">
                    </fieldset>

                    <input name="id_producto" type="hidden" value="<?php echo $id ?>">

                    <!-- Botones -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="<?php echo ($origen == 'productos')? './mostrar_productos.php':'./ver_producto.php?id=' . $id?>">Regresar</a>
                        </div>
                        <input type="hidden" name="id_producto" value="<?php echo $info_prod['id_producto'] ?>">
                        <button class="btn-form" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>