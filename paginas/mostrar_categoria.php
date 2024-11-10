<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de categorias</title>
</head>

<body>
    <?php include "menu_panel.php";
    include "../php/notificaciones.php";


    //Notificaciones
    if (isset($_SESSION["icon"])) {
        notify();
    } ?>

    <div class="usuarios-content main-content">
        <div class="titulo">
            <h3>TABLA DE CATEGORÍAS</h3>
        </div>
        <div class="opciones-btn">
            <div class="btn">
                <a href="./mostrar_productos.php">Regresar</a>
            </div>
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
                    <td class="btn-ver"> <a href="ver_categoria.php?origen=categorias&id=<?php echo $fila['id_categoria']; ?>"><img src="../imagenes/ojo.png" alt=""></a></td>
                    <!-- Editar usuario -->
                    <td class="btn-editar"> <a href="../paginas/editar_categoria.php?origen=categorias&id=<?php echo $fila['id_categoria']; ?>"><img src="../imagenes/edit.png" alt=""></a></td>
                    <!-- Eliminar usuario -->
                    <td class="btn-eliminar"> <a href="#" onClick="validar('../php/delete_categoria.php?id=<?php echo $fila['id_categoria']; ?>','<?php echo addslashes($fila['nombre_categoria']) ?>');"><img src="../imagenes/borrar.png" alt=""></a></td>
                </tr>
            <?php
            }
            ?>

        </table>

        <!-- fin -->
    </div>
    <script>
        function validar(url, categoria) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¿Estás seguro que deseas ELIMINAR la categoría: " + categoria + "?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#c8c8c8",
                cancelButtonColor: "#151e2d",
                confirmButtonText: "Sí, eliminar categoría",
                cancelButtonText: "No, mantener"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
</body>

</html>