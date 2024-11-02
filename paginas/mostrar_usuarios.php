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
            <h3>TABLA DE USUARIOS</h3>
        </div>

<br>
        <div class="Buscador">
        <form action="mostrar_usuarios.php">
          <input type="text" name="buscar_titulo" placeholder="Buscar por titulo">
          <button class="btn-form" type="submit" name="buscar">Buscar </button>
        </form>
      </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Rol</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>

            <nav class="nav">
            <ul class="paginacion">
              <!-- Anterior -->
              <li class="items">
                <a href="#">Anterior</a>
              </li>
              <!-- Paginas -->
                <li class="items">
                  <a href="#"></a>
                </li>

              <!-- Siguiente -->
              <li class="items">
                <a href="">Siguiente</a>
              </li>
            </ul>
          </nav>


            <td>1</td>
            <td>jose</td>
            <td>aguilar</td>
            <td>9997654345</td>
            <td>Empleado</td>

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
            var eliminar = confirm("¿Estás seguro que deseas ELIMINAR el usuario: " + username + "?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
</body>

</html>