<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de citas</title>
</head>

<body>
    <?php include "menu_panel.php" ?>

    <div class="usuarios-content main-content">
        <div class="titulo">
            <h3>TABLA DE CITAS</h3>
        </div>
        <div class="opciones-btn">
            <div class="btn-nuevo-cliente btn">
                <a href="#">Agendar cita</a>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>

            <td>1</td>
            <td>jose</td>
            <td>miguel</td>
            <td>12/09/2024</td>
            <td>13:00 hrs</td>

            <!-- Ver usuario -->
            <td class="btn-ver"> <a href="#"><img src="../imagenes/ojo.png" alt=""></a></td>
            <!-- Editar usuario -->
            <td class="btn-editar"> <a href="#"><img src="../imagenes/edit.png" alt=""></a></td>
            <!-- Eliminar usuario -->
            <td class="btn-eliminar"> <a href="#" onClick="validar('../php/delete_categoria.php?id=<?php echo $fila['id_categoria']; ?>','<?php echo addslashes($fila['nombre_categoria']) ?>');"><img src="../imagenes/borrar.png" alt=""></a></td>
            </tr>

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