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
    <div class="buscador-titulo">
      <form action="mostrar_usuarios.php">
        <input type="text" name="buscar_titulo" placeholder="Buscar por titulo">
        <button class="btn-form" type="submit" name="buscar">Buscar </button>
      </form>
    </div>
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
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Rol</th>
        <th>VER</th>
        <th>EDITAR</th>
        <th>ELIMINAR</th>
      </tr>
      <td>1</td>
      <td>Jose</td>
      <td>Aguilar</td>
      <td>9997654345</td>
      <td>Empleado</td>

      <!-- Ver usuario -->
      <td class="btn-ver"> <a href="#"><img src="../imagenes/ojo.png" alt=""></a></td>
      <!-- Editar usuario -->
      <td class="btn-editar"> <a href="#"><img src="../imagenes/edit.png" alt=""></a></td>
      <!-- Eliminar usuario -->
      <td class="btn-eliminar"> <a href="#" onClick=""><img src="../imagenes/borrar.png" alt=""></a></td>
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