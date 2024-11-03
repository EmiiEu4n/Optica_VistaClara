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
                <a href="./registrar_cita.php">Agendar cita</a>
            </div>
            <div class="btn-nuevo-cliente btn">
                <a href="./registrar_cliente.php">Registrar cliente</a>
            </div>
        </div><br>

        <nav class="pagination">
            <ul class="pagination-list">
                <!-- Anterior -->
                <li class="pag-item ">
                    <a href="#">Anterior</a>
                </li>

                <!-- Páginas -->

                <li class="pag-item <?php echo ($pagina == $i) ? 'active' : ''; ?>">
                    <a href="">
                        1
                    </a>
                </li>

                <!-- Siguiente -->
                <li class="pag-item">
                    <a href="">Siguiente</a>
                </li>
            </ul>
        </nav>
        <table>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>

            <?php
                require "../php/conexion.php";
                $todos_datos = "SELECT * FROM citas ORDER BY id_cita ASC";
                $resultado = mysqli_query($conectar, $todos_datos);

                while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><?php echo $fila['id_cita']; ?></td>
                        <td><?php echo $fila['nombre_cliente']; ?></td>
                        <td><?php echo $fila['fecha']; ?></td>
                        <td><?php echo $fila['hora']; ?></td>
                        <td class="btn-ver"> <a href="../paginas/ver_cita.php?id=<?php echo $fila['id_cita'];?>"><img src="../imagenes/ojo.png" alt=""></a></td>
              <td class="btn-editar"> <a href="../paginas/editar_cita.php?id=<?php echo $fila['id_cita'];?>"><img src="../imagenes/edit.png" alt=""></a></td>
              <td class="btn-eliminar"><a href="#" onclick="validar('../php/delete_cita.php?id=<?php echo $fila['id_cita']; ?>')"> <img src="../imagenes/borrar.png" alt=""> </a>
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