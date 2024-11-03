<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de clientes</title>
</head>

<body>
    <?php include "menu_panel.php" ?>

    <div class="usuarios-content main-content">
        <div class="titulo">
            <h3>TABLA DE CLIENTES</h3>
        </div>
        <div class="opciones-btn">
            <div class="btn-nuevo-cliente btn">
                <a href="./registrar_cliente.php">Nuevo cliente</a>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>TELEFONO</th>
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
                    <td> <?php echo "$fila[id_cliente]" ?></td>
                    <td> <?php echo "$fila[nombres]" ?></td>
                    <td> <?php echo "$fila[apellidos]" ?></td>
                    <td> <?php echo "$fila[telefono]" ?></td>
                    <!-- Ver usuario -->
                    <td class="btn-ver"> <a href="./ver_cliente.php?origen=clientes&id=<?php echo $fila['id_cliente']; ?>"><img src="../imagenes/ojo.png" alt=""></a></td>
                    <!-- Editar usuario -->
                    <td class="btn-editar"> <a href="./editar_cliente.php?origen=clientes&id=<?php echo $fila['id_cliente']; ?>"><img src="../imagenes/edit.png" alt=""></a></td>
                    <!-- Eliminar usuario -->
                    <td class="btn-eliminar"> <a href="#" onClick="validar('../php/delete_cliente.php?id=<?php echo $fila['id_cliente']; ?>','<?php echo  addslashes($fila['nombres'])." ".addslashes($fila['apellidos']); ?>');"><img src="../imagenes/borrar.png" alt=""></a></td>
                </tr>
            <?php
            }
            ?>

        </table>

        <!-- fin -->
    </div>
    <script>
        function validar(url, username) {
            var eliminar = confirm("¿Estás seguro que deseas ELIMINAR al cliente: " + username + "?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
</body>

</html>