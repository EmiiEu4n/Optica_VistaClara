<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de citas</title>
</head>

<body>
    <?php include "menu_panel.php";
    require "../php/conexion.php";
    //Notificaciones
    if (isset($_SESSION["icon"])) {
        if ($_SESSION['icon'] == 'success') {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                });
                </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        } else if ($_SESSION['icon'] == 'error') {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                });
                </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        } else if ($_SESSION['icon'] == 'warning') {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                });
                </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        } else if ($_SESSION['icon'] == 'info') {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                });
                </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        }
    }

    //Consulta de datos
    $datos = "SELECT ci.id_cita, cl.nombres, cl.apellidos, ci.fecha_cita, ci.hora, ci.estado FROM citas ci INNER JOIN clientes cl on ci.id_cliente = cl.id_cliente WHERE ci.estado = 'Pendiente'";
    // [Busqueda]
    // Inicializar variables
    $filtro = "";
    $nombre = isset($_GET['busca_nombre']) ? $_GET['busca_nombre'] : "";

    // Verificar si se hizo una búsqueda
    if (isset($nombre) && strlen($nombre) > 1) {
        $filtro = " AND cl.nombres LIKE '%$nombre%' ORDER BY cl.nombres ASC";
        $datos .= $filtro;
    }

    //consulta
    $resultado = mysqli_query($conectar, $datos);

    // [Paginación]
    // Recuperar número de filas
    $total_filas = $resultado->num_rows;


    // Limite de filas a mostrar
    $limite = 5;

    // Páginas que tenemos para mostrar
    $paginas = ceil($total_filas / $limite);

    // Verificar la página actual
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

    // Definir el inicio de la fila ejem. fila 3 lo demás antes del 3 se omite
    $inicio = ($pagina - 1) * $limite;

    // Agregar límite a la consulta
    $paginacion = " LIMIT $inicio, $limite";
    $datos .= $paginacion;

    // Realizar consulta con paginación
    $resultado = mysqli_query($conectar, $datos);

    // Concatenar parámetros en get con & si hay búsqueda
    $concatparams = ($nombre != "") ? "&busca_nombre=" . $nombre : "";

     // Notificaciones (código existente)
     if (isset($_SESSION["icon"])) {
        // Código de notificación
    }



    // Filtro de estado
    $estadoSeleccionado = isset($_GET['filtro_estado']) ? $_GET['filtro_estado'] : "";

    // Consulta inicial
    $datos = "SELECT ci.id_cita, cl.nombres, cl.apellidos, ci.fecha_cita, ci.hora, ci.estado 
              FROM citas ci 
              INNER JOIN clientes cl ON ci.id_cliente = cl.id_cliente 
              WHERE 1=1";

    // Filtro por nombre
    if ($nombre) {
        $datos .= " AND cl.nombres LIKE '%$nombre%'";
    }

    // Filtro por estado
    if ($estadoSeleccionado) {
        $datos .= " AND ci.estado = '$estadoSeleccionado'";
    }

    // Ordenamiento por fecha
    $ordenFecha = isset($_GET['orden_fecha']) ? $_GET['orden_fecha'] : 'ASC';
    $datos .= " ORDER BY ci.fecha_cita $ordenFecha";

    // Paginación y resultado de la consulta
    $resultado = mysqli_query($conectar, $datos);

    // [Paginación] (código existente)

    ?>

    <div class="usuarios-content main-content">
        <div class="titulo">
            <h3>TABLA DE CITAS</h3>
        </div>

        <div class="opciones-btn">
            <div class="btn-nuevo-cliente btn">
                <a href="./registrar_cita.php">Agendar cita</a>
            </div>
            <div class="btn-nuevo-cliente btn">
                <a href="./registrar_cliente.php?origen=citas">Registrar cliente</a>
            </div>
            <!-- <div class="btn-nuevo-cliente btn">
                <a href="./mostrar_historial_citas.php">Historial</a>
            </div> -->
            <div class="btn-nuevo-cliente btn">
                <a href="./mostrar_citas.php">Tabla completa</a>
            </div>
        </div><br>
        <!-- Buscador -->
        <div class="buscador-titulo">
            <form action="./mostrar_citas.php">
                <input type="text" name="busca_nombre" value="<?php echo $nombre ?>" placeholder="Buscar por nombre del cliente">
                <select name="filtro_estado">
                    <option value="">Todos</option>
                    <option value="Pendiente" <?php echo $estadoSeleccionado == "Pendiente" ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="Terminado" <?php echo $estadoSeleccionado == "Terminado" ? 'selected' : ''; ?>>Terminado</option>
                    <option value="Cancelado" <?php echo $estadoSeleccionado == "Cancelado" ? 'selected' : ''; ?>>Cancelado</option>
                </select>
                <button class="btn-form" type="submit" >Buscar </button>
            </form>
        </div>

        <!-- Paginación -->
        <nav class="pagination">
            <ul class="pagination-list">
                <!-- Anterior -->
                <li class="pag-item <?php echo ($pagina <= 1) ? 'disable' : ''; ?>">
                    <a href="./mostrar_citas.php?pagina=<?php echo ($pagina > 1) ? $pagina - 1 : 1;
                                                    echo $concatparams . '&orden_fecha=' . $ordenFecha; ?>">Anterior</a>
                </li>

                <!-- Páginas -->
                <?php for ($i = 1; $i <= $paginas; $i++): ?>
                    <li class="pag-item <?php echo ($pagina == $i) ? 'active' : ''; ?>">
                        <a href="./mostrar_citas.php?pagina=<?php echo $i . $concatparams . '&orden_fecha=' . $ordenFecha; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <!-- Siguiente -->
                <li class="pag-item <?php echo ($pagina >= $paginas) ? 'disable' : ''; ?>">
                    <a href="./mostrar_citas.php?pagina=<?php echo ($pagina < $paginas) ? $pagina + 1 : $paginas;
                                                    echo $concatparams . '&orden_fecha=' . $ordenFecha; ?>">Siguiente</a>
                </li>
            </ul>
        </nav>

        
        <table>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>
                    <a href="./mostrar_citas.php?pagina=<?php echo $pagina . $concatparams . '&orden_fecha=ASC'; ?>">Fecha &#x2191;</a> |
                    <a href="./mostrar_citas.php?pagina=<?php echo $pagina . $concatparams . '&orden_fecha=DESC'; ?>">Fecha &#x2193;</a>
                </th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Ver</th>
                <!-- <th>EDITAR</th> -->
                <th>Eliminar</th>
            </tr>

            <?php
            if ($total_filas == 0) {
                // Si no hay resultados, mostrar mensaje dentro de una fila y celda de la tabla
                echo '<tr><td colspan="8">No hay resultados...</td></tr>';
            }

            while ($fila = mysqli_fetch_assoc($resultado)) {
            ?>
                <tr>
                    <td><?php echo $fila['id_cita']; ?></td>
                    <td><?php echo $fila['nombres'] . " " . $fila['apellidos']; ?></td>
                    <td> <?php
                            // Obtener la fecha de la fila
                            $fecha = $fila['fecha_cita'];
                            // Formatear la fecha en un formato más legible
                            // Ejemplo: 5 de noviembre de 2024
                            // $fecha_formateada = date("j \d\e F \d\e Y", strtotime($fecha));
                            //Nov 5, 2024
                            $fecha_formateada = date("j M, Y", strtotime($fecha));

                            // Mostrar la fecha formateada
                            echo $fecha_formateada;
                            ?></td>
                    <td><?php
                        // Obtener la hora de la fila
                        $hora = $fila['hora'];
                        // Formatear la hora de 24h a 12h con AM/PM
                        $hora_formateada = date("g:i A", strtotime($hora));
                        // Mostrar la hora formateada
                        echo $hora_formateada;
                        ?></td>
                    <td><?php echo $fila['estado']; ?></td>
                    <!-- Ver -->
                    <td class="btn-ver"> <a href="../paginas/ver_cita.php?origen=citas&id=<?php echo $fila['id_cita']; ?>"><img src="../imagenes/ojo.png" alt=""></a></td>
                    <!-- Editar -->
                    <!-- <td class="btn-editar"> <a href="../paginas/editar_cita.php?id=<?php echo $fila['id_cita']; ?>"><img src="../imagenes/edit.png" alt=""></a></td> -->
                    <!-- Eliminar -->
                    <td class="btn-eliminar">
                        <a href="#" onclick="validar('../php/delete_cita.php?id=<?php echo $fila['id_cita'] ?>', '<?php echo addslashes($fila['nombres']) . ' ' . addslashes($fila['apellidos']) ?>')">
                            <img src="../imagenes/borrar.png" alt="">
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
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¿Estás seguro que deseas ELIMINAR la cita del cliente: " + username + "?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#c8c8c8",
                cancelButtonColor: "#151e2d",
                confirmButtonText: "Sí, eliminar cita",
                cancelButtonText: "No, mantener"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
<style>
    .swal2-confirm:focus {
  background-color: #4CAF50;
  color: white;
}

.swal2-cancel:focus {
  background-color: #FF5733;
  color: white;
}
</style>
</body>

</html>