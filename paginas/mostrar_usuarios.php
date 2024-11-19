<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de usuarios</title>
</head>

<body>
  <?php include "menu_panel.php";
  require "../php/conexion.php";
  if ($_SESSION['rol'] != 'Administrador') {
    header("Location: ../paginas/dashboard.php");
    exit();
  }

  //recuperar los datos de la base de datos
  $datos_usuarios = "SELECT id_usuario, nombres, apellidos, rol, correo, telefono, tabla
    FROM (
        SELECT id_empleado AS id_usuario, nombres, apellidos, rol, correo, telefono, 'Empleados' AS tabla
        FROM empleados 
        WHERE id_empleado >= '2'
        UNION
        SELECT id_cliente AS id_usuario, nombres, apellidos, rol, correo, telefono, 'Clientes' AS tabla
        FROM clientes
    ) AS usuarios";

  // [Busqueda]
  // Inicializar variables
  $filtro = "";
  $nombre = isset($_GET['busca_nombre']) ? $_GET['busca_nombre'] : "";

  // Verificar si se hizo una búsqueda
  if (isset($nombre) && strlen($nombre) > 1) {
    $filtro = " WHERE nombres LIKE '%$nombre%' ORDER BY nombres ASC";
    $datos_usuarios = $datos_usuarios . $filtro;
  }

  //consulta
  $resultado = mysqli_query($conectar, $datos_usuarios);

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
  $datos_usuarios = $datos_usuarios . $paginacion;

  // Realizar consulta con paginación
  $resultado = mysqli_query($conectar, $datos_usuarios);

  // Concatenar parámetros en get con & si hay búsqueda
  $concatparams = ($nombre != "") ? "&busca_nombre=" . $nombre : "";
  ?>
  <div class="usuarios-content main-content">
    <div class="titulo">
      <h3>TABLA DE USUARIOS</h3>
    </div>
    <br>
    <div class="buscador-titulo">
      <form action="mostrar_usuarios.php">
        <input type="text" name="busca_nombre" value="<?php echo $nombre ?>" placeholder="Buscar por nombre del usuario">
        <button class="btn-form" type="submit" >Buscar </button>
      </form>
    </div>
    
    <div class="opciones-btn">
      <div class=" btn">
        <a href="./mostrar_usuarios.php">Ver todos</a>
      </div>
    </div>

    <!-- Paginación -->
    <nav class="pagination">
      <ul class="pagination-list">
        <!-- Anterior -->
        <li class="pag-item <?php echo ($pagina <= 1) ? 'disable' : ''; ?>">
          <a href="./mostrar_usuarios.php?pagina=<?php echo ($pagina > 1) ? $pagina - 1 : 1;
                                                  echo $concatparams; ?>">Anterior</a>
        </li>

        <!-- Páginas -->
        <?php for ($i = 1; $i <= $paginas; $i++): ?>
          <li class="pag-item <?php echo ($pagina == $i) ? 'active' : ''; ?>">
            <a href="./mostrar_usuarios.php?pagina=<?php echo $i . $concatparams; ?>">
              <?php echo $i; ?>
            </a>
          </li>
        <?php endfor; ?>

        <!-- Siguiente -->
        <li class="pag-item <?php echo ($pagina >= $paginas) ? 'disable' : ''; ?>">
          <a href="./mostrar_usuarios.php?pagina=<?php echo ($pagina < $paginas) ? $pagina + 1 : $paginas;
                                                  echo $concatparams; ?>">Siguiente</a>
        </li>
      </ul>
    </nav>
    <div class="table-container">

      <table>
        <thead>
          <tr>
            <th>Nombre(s)</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Rol</th>
            <th>Tabla</th>
            <th>VER</th>
            <th>EDITAR</th>
            <th>ELIMINAR</th>
          </tr>
        </thead>

        <tbody>
          <?php
          if ($total_filas == 0) {
            // Si no hay resultados, mostrar mensaje dentro de una fila y celda de la tabla
            echo '<tr><td colspan="8">No hay resultados de búsqueda</td></tr>';
          }
          while ($fila = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td><?php echo $fila['nombres'] ?></td>
              <td><?php echo $fila['apellidos'] ?></td>
              <td><?php echo $fila['telefono'] ?></td>
              <td><?php echo $fila['rol'] ?></td>
              <td><?php echo $fila['tabla'] ?></td>

              <!-- Ver usuario -->
              <td class="btn-ver"> <a href="<?php echo ($fila['tabla'] == 'Empleados') ? './ver_empleado.php?origen=usuarios&id=' . $fila['id_usuario'] : './ver_cliente.php?origen=usuarios&id=' . $fila['id_usuario'] ?>"><img src="../imagenes/ojo.png" alt=""></a></td>
              <!-- Editar usuario -->
              <td class="btn-editar"> <a href="<?php echo ($fila['tabla'] == 'Empleados') ? './editar_empleado.php?origen=usuarios&id=' . $fila['id_usuario'] : './editar_cliente.php?origen=usuarios&id=' . $fila['id_usuario'] ?>"><img src="../imagenes/edit.png" alt=""></a></td>
              <!-- Eliminar usuario -->
              <td class="btn-eliminar"> <a href="#" onClick="validar('<?php echo ($fila['tabla'] == 'Empleados') ? '../php/delete_empleado.php?origen=usuarios&id=' . $fila['id_usuario'] : '../php/delete_cliente.php?origen=usuarios&id=' . $fila['id_usuario']; ?>', '<?php echo $fila['nombres'] . ' ' . $fila['apellidos']; ?>');"><img src="../imagenes/borrar.png" alt=""></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    
    <!-- fin -->
  </div>
  <script>
        function validar(url, username) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¿Estás seguro que deseas ELIMINAR al usuario: " + username + "?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#c8c8c8",
                cancelButtonColor: "#151e2d",
                confirmButtonText: "Sí, eliminar usuario",
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