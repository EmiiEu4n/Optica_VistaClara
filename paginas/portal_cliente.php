<?php require "../php/seguridad_cliente.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal de Cliente</title>
</head>

<body>
    <!-- Header / barra de navegacion -->
    <?php include "./header_portal.php";
    include "../php/conexion.php";
    include "../php/notificaciones.php";
    if (isset($_SESSION["icon"])) {
        notify();
    } ?>


    <!-- Preparar información -->
    <?php
    $id = $_SESSION['id_cliente'];

    $sql = "SELECT ci.id_cita, concat(cl.nombres, ' ',cl.apellidos) as nombre_cliente, ci.fecha_cita, ci.hora, ci.estado, ci.motivo 
    FROM citas ci 
    INNER JOIN clientes cl ON ci.id_cliente = cl.id_cliente  WHERE ci.id_cliente = $id AND ci.estado = 'Pendiente' ORDER BY ci.fecha_cita, ci.hora ASC";
    $result = mysqli_query($conectar, $sql);
    ?>

    <main class="main-content">
        <section class="welcome-section">
            <h2>¡Bienvenido, <?php echo $_SESSION['nombre_cliente'] ?>!</h2>
            <p> <span>Aquí puedes gestionar tu cuenta y citas fácilmente.</span> </p>
        </section>

        <section class="account-info">
            <h3><i class="fa-solid fa-user"></i> Información de la Cuenta</h3>
            <p>Nombre Completo: <span><?php echo $_SESSION['nombre_cliente'] ?></span> </p>
            <p>Email: <span><?php echo  $_SESSION['correo_cliente'] ?></span> </p>
            <button class="btn" onclick="window.location='../paginas/perfil_cliente.php'; return false;">Mi Cuenta</button>
        </section>

        <section class="appointments">
            <h3><i id="icono-cita" class="fa-regular fa-calendar-days fa-fade"></i> Mis Citas Programadas</h3>
            <ul>
                <?php
                if ($result->num_rows < 1) {
                    echo '<li>No tienes citas programadas... 👓</li>';
                } else {
                    $aux = 0;
                    while ($row = $result->fetch_assoc()) {
                        $fecha_formateada = date("j M, Y", strtotime($row['fecha_cita']));
                        $hora_formateada = ($row['hora'] != "") ? date("g:i A", strtotime($row['hora'])) : "N/D";
                        $aux++;
                ?>
                        <li>Cita <?php echo $aux ?>: <?php echo $fecha_formateada ?> - <?php echo $hora_formateada ?></li>
                <?php }
                } ?>
            </ul>
            <button class="btn" onclick="window.location='../paginas/mostrar_citas_cliente.php'; return false;">Ver Más</button>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2024 Óptica Vista Clara. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const iconoCita = document.getElementById("icono-cita");

            function agregarAnimacion() {
                console.log("Se ha llamado a agregarAnimacion");
                iconoCita.classList.add("fa-fade");
            }

            function quitarAnimacion() {
                console.log("Se ha llamado a quitarAnimacion");
                iconoCita.classList.remove("fa-fade");
            }

            // Hacer que PHP invoque la función correcta
            <?php if ($result->num_rows < 1) { ?>
                quitarAnimacion();
            <?php } else { ?>
                agregarAnimacion();
            <?php } ?>
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="scripts.js"></script>
    <script src="../javascript/notificaciones.js" defer></script>
</body>

</html>