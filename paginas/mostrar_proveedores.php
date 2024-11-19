<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de proveedores</title>
</head>

<body>
    <?php include "menu_panel.php";
    //Notificaciones
    include "../php/notificaciones.php";
    if (isset($_SESSION["icon"])) {
        notify();
    } 
    ?>

    <div class="usuarios-content main-content">
        <div class="titulo">
            <h3>TABLA DE PROVEEDORES</h3>
        </div>
        <div class="opciones-btn">
            <div class="btn-nuevo-cliente btn">
                <a href="./registrar_proveedor.php">Nuevo proveedor</a>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>EMPRESA</th>
                <th>CONTACTO</th>
                <th>TELEFONO</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
            <?php
            require "../php/conexion.php";

            $datos_proveedor = "SELECT * FROM proveedores ORDER BY id_proveedor ASC";
            $resultado = mysqli_query($conectar, $datos_proveedor);

            while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <!-- id -->
                    <td> <?php echo "$fila[id_proveedor]" ?></td>
                    <!-- Empresa -->
                    <td> <?php echo "$fila[nombre]" ?></td>
                    <!-- Contacto -->
                    <td> <?php echo "$fila[contacto]" ?></td>
                    <!-- Telefono -->
                    <td> <?php echo "$fila[telefono]" ?></td>
                    <!-- Ver usuario -->
                    <td class="btn-ver"> <a href="../paginas/ver_proveedor.php?origen=proveedores&id=<?php echo $fila['id_proveedor']; ?>"><img src="../imagenes/ojo.png" alt=""></a></td>
                    <!-- Editar usuario -->
                    <td class="btn-editar"> <a href="../paginas/editar_proveedor.php?origen=proveedores&id=<?php echo $fila['id_proveedor']; ?>"><img src="../imagenes/edit.png" alt=""></a></td>
                    <!-- Eliminar usuario -->
                    <td class="btn-eliminar"> <a href="#" onClick="validar('../php/delete_proveedor.php?id=<?php echo $fila['id_proveedor']; ?>','<?php echo addslashes($fila['nombre']); ?>');"><img src="../imagenes/borrar.png" alt=""></a></td>
                </tr>
            <?php
            }
            ?>

        </table>

        <!-- fin -->
    </div>
    <script>
        function validar(url, empresa) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¿Estás seguro que deseas ELIMINAR la empresa: " + empresa + "?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#c8c8c8",
                cancelButtonColor: "#151e2d",
                confirmButtonText: "Sí, eliminar empresa",
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