<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>

<body>
    <?php include "./menu_panel.php"; ?>
    <div class="content-dashboard main-content">
        <img src="../imagenes/logo.png" alt="">
        <!-- <a href="./prueba.php">Pruebame</a> -->
        <?php  // No olvides iniciar la sesión donde la uses
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
            }
        }
        ?>
    </div>
</body>




</html>