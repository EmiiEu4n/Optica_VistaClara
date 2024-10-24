<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de categorias</title>
</head>

<body>
    <?php include "menu_panel.php" ?>

    <div class="usuarios-content main-content">
        <div class="titulo">
            <h3>TABLA DE CATEGORÍAS</h3>
        </div>
        <div class="opciones-btn">
            <div class="btn-nuevo-cliente btn">
                <a href="registrar_categoria.php">Nueva categoria</a>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
            <?php
            require "../php/conexion.php";

            $datos_categoria = "SELECT * FROM categorias ORDER BY id_categoria ASC";
            $resultado = mysqli_query($conectar, $datos_categoria);

            while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td> <?php echo "$fila[id_categoria]" ?> </td>
                    <td> <?php echo "$fila[nombre_categoria]" ?></td>

                    <!-- Ver usuario -->
                    <td class="btn-ver"> <a href="ver_categoria.php?id=<?php echo $fila['id_categoria']; ?>"><img src="../imagenes/ojo.png" alt=""></a></td>
                    <!-- Editar usuario -->
                    <td class="btn-editar"> <a href="../paginas/editar_categoria.php?id=<?php echo $fila['id_categoria']; ?>"><img src="../imagenes/edit.png" alt=""></a></td>
                    <!-- Eliminar usuario -->
                    <td class="btn-eliminar"> <a href="#" onClick="validar('../php/delete_categoria.php?id=<?php echo $fila['id_categoria']; ?>','<?php echo $fila['nombre_categoria'] ?>');"><img src="../imagenes/borrar.png" alt=""></a></td>
                </tr>
            <?php
            }
            ?>

        </table>

        <!-- fin -->
    </div>
    <script>
        function validar(url, username) {
            var eliminar = confirm("¿Estás seguro que deseas ELIMINAR la categoría: " + username + "?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
</body>

</html>