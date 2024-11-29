<?php
// include "seguirdad.php";
session_start();
$usuario = $_SESSION['nombre_cliente'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal del Cliente - Óptica Vista Clara</title>
    <link rel="stylesheet" href="../cliente/styles.css">
</head>
<body>
    <?php
    include "../php/notificaciones.php";
    //Notificaciones
    session_start();
    if (isset($_SESSION["icon"])) {
        notify();
    }
    ?>
    <div style="margin: auto;">
        <div style="width: 150px;">
            <img src="https://www.senaleticaec.com/wp-content/uploads/2022/12/Sin-titulo-10.png" alt="NAda" style="width: 190px;"><br>
            <a href="../php/salir.php">Salir</a>
            <a href="../paginas/registrar_cita_cliente.php">Registrar cita</a>
            <a href="../paginas/perfil_cliente.php">Perfil</a>

            <!-- <?php
                    session_start();

                    echo $_SESSION['id_cliente'] . "<br>";
                    echo $_SESSION['nombre_cliente'] . "<br>";
                    echo $_SESSION['verificado'] . "<br>";
                    echo $_SESSION['rol_cliente'] . "<br>";
                    echo $_SESSION['cliente_autentificado'] . "<br>";
                    ?> -->
        </div>

    </div>
    <script src="../javascript/sweetalert2.js"></script>
    <script src="../javascript/notificaciones.js" defer></script>
</body>
</html>