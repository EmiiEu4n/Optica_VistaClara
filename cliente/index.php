<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal del Cliente - Óptica Vista Clara</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Óptica Vista Clara - Portal del Cliente</h1>
        <nav>
            <ul>
                <li><a href="#citas">Mis Citas</a></li>
                <li><a href="#perfil">Mi Perfil</a></li>
                <li><a href="#logout">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="citas">
            <h2>Mis Citas</h2>
            <div class="citas-container">
                <div class="citas-proximas">
                    <h3>Citas Próximas</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Motivo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
          require "../php/conexion.php";
          $todos_datos = "SELECT * FROM citas ORDER BY  id_cita ASC";

          $resultado = mysqli_query($conectar, $todos_datos);

          while ($fila = mysqli_fetch_assoc($resultado)) {
          ?>
                        <tbody>
                            <tr>
                                <td><?php echo "$fila[fecha]" . "<br>"; ?></td>
                                <td><?php echo "$fila[hora]" . "<br>"; ?></td>
                                <td><?php echo "$fila[motivo]" . "<br>"; ?></td>
                                <td><button class="btn-cancelar">Cancelar</button></td>
                            </tr>
                        </tbody>
                        <?php
          }
          ?>
                    </table>
                </div>
                <div class="citas-pasadas">
                    <h3>Historial de Citas</h3>
                    <table>
                        <thead>
                        <?php
          require "../php/conexion.php";
          $todos_datos = "SELECT * FROM citas ORDER BY  id_cita ASC";

          $resultado = mysqli_query($conectar, $todos_datos);

          while ($fila = mysqli_fetch_assoc($resultado)) {
          ?>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Motivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><?php echo "$fila[fecha]" . "<br>"; ?></td>
                            <td><?php echo "$fila[hora]" . "<br>"; ?></td>
                            <td><?php echo "$fila[motivo]" . "<br>"; ?></td>
                            </tr>
                        </tbody>
                        <?php
          }
          ?>
                    </table>
                </div>
            </div>
        </section>

        <section id="perfil">
            <h2>Mi Perfil</h2>
            <?php
          require "../php/conexion.php";
          $id = $_GET['id'];

          $ver_usuario = "SELECT * FROM clientes WHERE id_cliente = '$id'";
          $resultado = mysqli_query($conectar, $ver_usuario);

          $fila = $resultado->fetch_array();
        //   echo $fila ["nombre"];
          ?>
            <form action="../php/update_cliente.php?origen=<?php echo $origen?>" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombres" value=" " required>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="correo" value=" " required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" value=" " required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <textarea  name="direccion" required> </textarea>
                </div>
                <button type="submit" class="btn-actualizar">Actualizar Perfil</button>
            </form>
        </section>

        <!-- <section id="notificaciones">
            <h2>Notificaciones</h2>
            <div class="notificacion">
                <p><strong>Cita actualizada:</strong> Su cita del 15/06/2023 ha sido confirmada.</p>
                <p class="fecha-notificacion">Recibido: 10/06/2023</p>
            </div>
            <div class="notificacion">
                <p><strong>Recordatorio:</strong> Tiene una cita programada para mañana a las 16:30.</p>
                <p class="fecha-notificacion">Recibido: 29/06/2023</p>
            </div>
        </section> -->
    </main>

    <footer>
        <p>&copy; 2023 Óptica Vista Clara. Todos los derechos reservados.</p>
    </footer>
</body>
</html>