<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de empleados</title>
</head>

<body>
    <?php include "menu_panel.php";
     if($_SESSION['rol'] != 'Administrador'){
        header("Location: ../paginas/dashboard.php");
     }
    ?>

    <div class="usuarios-content main-content">
        <div class="titulo">
            <h3>TABLA DE EMPLEADOS</h3>
        </div>
        <div class="opciones-btn">
            <div class="btn-nuevo-cliente btn">
                <a href="registrar_empleado.php">Nuevo empleado</a>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>TELEFONO</th>
                <th>ROL</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
            <?php
            require "../php/conexion.php";

            $datos_usuario = "SELECT * FROM empleados ORDER BY id_empleado ASC";
            $resultado = mysqli_query($conectar, $datos_usuario);

            while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td> <?php echo "$fila[id_empleado]" ?></td>
                    <td> <?php echo "$fila[nombres]" ?></td>
                    <td> <?php echo "$fila[apellidos]" ?></td>
                    <td> <?php echo "$fila[telefono]" ?></td>
                    <td> <?php echo "$fila[rol]" ?></td>
                    <!-- Ver usuario -->
                    <td class="btn-ver"> <a href="/paginas/ver_empleado.php?id=<?php echo $fila['id_empleado']; ?>"><img src="/imagenes/ojo.png" alt=""></a></td>
                    <!-- Editar usuario -->
                    <td class="btn-editar"> <a href="/paginas/editar_empleado.php?id=<?php echo $fila['id_empleado']; ?>"><img src="/imagenes/edit.png" alt=""></a></td>
                    <!-- Eliminar usuario -->
                    <td class="btn-eliminar"> <a href="#" onClick="validar('../php/delete_empleado.php?id=<?php echo $fila['id_empleado']; ?>','<?php echo $fila['nombres']." ".$fila['apellidos']; ?>');"><img src="/imagenes/borrar.png" alt=""></a></td>
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