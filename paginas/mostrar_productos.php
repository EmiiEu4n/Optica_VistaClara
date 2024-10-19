<!DOCTYPE html>
<html lang="en">

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
            <tr>
                <td>1</td>
                <td>Producto Ejemplo</td>
                <td>$99.99</td>
                <td>Descripción del producto de ejemplo.</td>
                
                <td class="btn-ver"> <a href="../paginas/ver_producto.php?id=1"><img src="../imagenes/ojo.png" alt=""></a></td>
                <td class="btn-editar"> <a href="../paginas/editar_producto.php?id=1"><img src="../imagenes/edit.png" alt=""></a></td>
                <td class="btn-eliminar">
                    <a href="#" onClick="validar('/php/delete_producto.php?id=1');">
                        <img src="../imagenes/borrar.png" alt="">
                    </a>
                </td>
            </tr>
        </table>
    </div>

    <script>
        function validar(url, nombre) {
            var eliminar = confirm("¿Estás seguro que deseas ELIMINAR el producto: " + nombre + "?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
</body>

</html>
