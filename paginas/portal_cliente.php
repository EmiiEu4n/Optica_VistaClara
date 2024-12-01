<?php session_start();?>
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
    include "../php/conexion.php"; ?>

    <!-- Preparar información -->
    <?php
    $id = $_SESSION['id_cliente'];

    $sql = "SELECT ci.id_cita, concat(cl.nombres, ' ',cl.apellidos) as nombre_cliente, ci.fecha_cita, ci.hora, ci.estado, ci.motivo 
    FROM citas ci 
    INNER JOIN clientes cl ON ci.id_cliente = cl.id_cliente  WHERE ci.id_cliente = $id";
    $result = mysqli_query($conectar, $sql);
    ?>

    <main class="main-content">
        <section class="welcome-section">
            <h2>¡Bienvenido, <?php echo $_SESSION['nombre_cliente']?>!</h2>
            <p>Aquí puedes gestionar tu cuenta y citas fácilmente.</p>
        </section>

        <section class="account-info">
            <h3>Información de la Cuenta</h3>
            <p>Nombre Completo: <?php echo $_SESSION['nombre_cliente'] ?></p>
            <p>Email: <?php echo  $_SESSION['correo_cliente'] ?></p>
            <button class="btn" onclick="window.location='../paginas/perfil_cliente.php'; return false;">Mi Cuenta</button>
        </section>

        <section class="appointments">
            <h3>Mis Citas Programadas</h3>
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
                    <li>Cita <?php echo $aux?>: <?php echo $fecha_formateada ?> - <?php echo $hora_formateada ?></li>
                <?php } }?>
            </ul>
            <button class="btn" onclick="window.location='../paginas/ver_cita_cliente.php'; return false;">Ver Más</button>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2024 Óptica Vista Clara. Todos los derechos reservados.</p>
    </footer>

    <script src="scripts.js"></script>
</body>

</html>