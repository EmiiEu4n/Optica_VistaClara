<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
</head>

<body>
    <?php include "menu_panel.php";

    include "../php/notificaciones.php";


    //Notificaciones
    if (isset($_SESSION["icon"])) {
        notify();
    } ?>
    <!-- Manteniendo el menú si es necesario -->
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>REGISTRAR NUEVO PRODUCTO</h3>
        </div>
        <div class="content-info">
            <div class="content-registrar formulario">
                <form id="miFormulario" action="../php/create_producto.php" method="post" enctype="multipart/form-data">
                    <label for="">Los campos con <span>*</span> son obligatorios.</label><br>
                    <fieldset>
                        <legend>Información del producto</legend>
                        <!-- Nombre -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input maxlength="35" class="validar-espacios" pattern="[a-zA-Z0-9\s]{3,254}" required name="nombre" type="text" placeholder="Ingrese el nombre maximo 5 palabras"><br><br>

                        <!-- Categoría -->
                        <label for="">Categoría<span>*</span></label><br>
                        <select style="width: 100%;" required class="elementos" name="id_categoria" id="">
                            <option value="">Escoger tu categoria</option>
                            <?php
                            include "../php/conexion.php";

                            $resultado = $conectar->QUERY("SELECT * FROM categorias");
                            while ($fila = $resultado->fetch_array()) {
                            ?>
                                <option value="<?php echo $fila["id_categoria"]; ?>"> <?php echo $fila["nombre_categoria"]; ?> </option>
                            <?php
                            }
                            mysqli_free_result($resultado)
                            ?>
                        </select><br><br>

                        <!-- Precio -->
                        <label for="">Precio<span>*</span></label><br>
                        <label for="">$</label><input style="width: 98%;" required name="precio" type="number" placeholder="Ingrese el precio"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Detalles del producto</legend>
                        <!-- Descripción -->
                        <label for="">Descripción<span>*</span></label><br>
                        <textarea maxlength="150" class="validar-espacios" style="width: 100%;" required name="descripcion" rows="3" placeholder="Ingrese una descripción"></textarea><br><br>

                        <!-- Stock (solo permite números) -->
                        <!-- <label for="stock">Stock<span>*</span></label><br> -->
                        <input name="stock" type="hidden" value="0" min="0" placeholder="Ingrese la cantidad en stock">

                        <!-- Proveedor -->
                        <label for="proveedor">Proveedor<span>*</span></label><br>
                        <select style="width: 100%;" required class="elementos" name="id_proveedor" id="">
                            <option value="">Escoger un proveedor</option>
                            <?php
                            include "../php/conexion.php";

                            $resultado = $conectar->QUERY("SELECT * FROM proveedores");
                            while ($fila = $resultado->fetch_array()) {
                            ?>
                                <option value="<?php echo $fila["id_proveedor"]; ?>"> <?php echo $fila["nombre"]; ?> </option>
                            <?php
                            }
                            mysqli_free_result($resultado)
                            ?>

                        </select><br><br>
                        <!-- Imagen del producto -->
                        <label for="">Imagen del producto<span>*</span></label><br>
                        <input required type="file" name="imagen" id="">
                    </fieldset>

                    <!-- Botones -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_productos.php">Regresar</a>
                        </div>
                        <button class="btn-form" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>