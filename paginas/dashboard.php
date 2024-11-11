<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>

<body>
    <?php include "./menu_panel.php"; include "../php/notificaciones.php";?>
    <div class="content-dashboard main-content">
        <img src="../imagenes/logo.png" alt="">
        <a href="./prueba.php">Pruebame</a>
        <?php  // No olvides iniciar la sesión donde la uses
        if (isset($_SESSION["icon"])) {
            if ($_SESSION['icon'] == 'success') {
                notify();
            }
        }
        ?>
    </div>
</body>




</html>