<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de categorías</title>
</head>

<body>
    <?php include "menu_panel.php" ?>

    <!-- Menú del panel -->
    <div class="usuarios-content main-content">
        <div class="titulo">
            <h3>TABLA DE LAS CATEGORÍAS</h3>
        </div>
        <div class="opciones-btn">
            <div class="btn-nuevo-producto btn">
                <a href="registrar_categoria.php">Nueva categoria</a>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>NOMBRE CATEGORIA</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
            <!-- Categoria de ejemplo -->
            <tr>
                <td>1</td>
                <td>Armazón</td>
     
                
                <td class="btn-ver"> <a href="ver_categoria.php"><img src="../imagenes/ojo.png" alt=""></a></td>
                <td class="btn-editar"> <a href="editar_categoria.php"><img src="../imagenes/edit.png" alt=""></a></td>
                <td class="btn-eliminar">
                    <a href="#" onClick="eliminar.php">
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
