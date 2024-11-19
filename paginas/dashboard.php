<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>

<body>
    <?php include "./menu_panel.php";
    include "../php/notificaciones.php";

    //Notificaciones
    if (isset($_SESSION["icon"])) {
        notify();
    }
    ?>
</body>




</html>