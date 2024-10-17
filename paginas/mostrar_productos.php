<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de clientes</title>
</head>

<body>
    <?php include "menu_panel.php" ?>

    <!-- Prueba comentario -->
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
                <th>NOMBRES</th>
                <th>CATEGORIA</th>
                <th>PRECIO</th>
                <th>DESCRIPCIÓN</th>
                <th>STOCK</th>
                <th>PROVEEDOR</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
            <?php
            require "../php/conexion.php";

            $datos_usuario = "SELECT * FROM clientes ORDER BY id_cliente ASC";
            $resultado = mysqli_query($conectar, $datos_usuario);

            while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td> <?php echo "$fila[id_producto]" ?></td>
                    <td> <?php echo "$fila[nombre]" ?></td>
                    <td> <?php echo "$fila[categoria]" ?></td>
                    <td> <?php echo "$fila[precio]" ?></td>
                    <td> <?php echo "$fila[descripcion]" ?></td>
                    <td> <?php echo "$fila[stock]" ?></td>
                    <td> <?php echo "$fila[id_proveedor]" ?></td>

                    <!-- Ver usuario -->
                    <td class="btn-ver"> <a href="/paginas/ver_producto.php?id=<?php echo $fila['id_producto']; ?>"><img src="/imagenes/ojo.png" alt=""></a></td>
                    <!-- Editar usuario -->
                    <td class="btn-editar"> <a href="/paginas/editar_producto.php?id=<?php echo $fila['id_producto']; ?>"><img src="/imagenes/edit.png" alt=""></a></td>
                    <!-- Eliminar usuario -->
                    <td class="btn-eliminar">
                        <a href="#" onClick="validar('../php/delete_producto.php?id=<?php echo $fila['id_producto']; ?>');">
                        <img src="/imagenes/borrar.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </table>

        <!-- fin -->
    </div>
    <script>
        function validar(url, username) {
            var eliminar = confirm("¿Estás seguro que deseas ELIMINAR el producto: " + username + "?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
</body>

</html>