<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
</head>

<body>
    <?php include "menu_panel.php" ?>
    <!-- Manteniendo el menú si es necesario -->
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>REGISTRAR NUEVO PRODUCTO</h3>
        </div>
        <div class="content-info">
            <div class="content-registrar formulario">
                <form action="#" method="post">
                    <fieldset>
                        <legend>Información del producto</legend>
                        <!-- Nombre -->
                        <label for="">Nombre(s)<span>*</span></label><br>
                        <input required name="nombres" type="text" placeholder="Ingrese el nombre"><br><br>

                        <!-- Categoría -->
                        <label for="">Categoría<span>*</span></label><br>
                        <input required name="categoria" type="text" placeholder="Ingrese la categoría"><br><br>

                        <!-- Precio -->
                        <label for="">Precio<span>*</span></label><br>
                        <input required name="precio" type="text" placeholder="Ingrese el precio"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Detalles del producto</legend>
                        <!-- Descripción -->
                        <label for="">Descripción<span>*</span></label><br>
                        <textarea name="descripcion" rows="3" placeholder="Ingrese una descripción"></textarea><br><br>

                        <!-- Stock (solo permite números) -->
                        <label for="stock">Stock<span>*</span></label><br>
                        <input required name="stock" type="number" min="0" placeholder="Ingrese la cantidad en stock"><br><br>

                        <!-- Proveedor -->
                        <label for="proveedor">Proveedor<span>*</span></label><br>
                        <select required name="proveedor" id="proveedor">
                            <option value="">Seleccione un proveedor</option>
                            <option value="proveedor1">Proveedor 1</option>
                            <option value="proveedor2">Proveedor 2</option>
                            <option value="proveedor3">Proveedor 3</option>
                        </select><br><br>
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
