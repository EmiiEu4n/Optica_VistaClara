<?php
// require '../php/seguridad.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="../css/normalize.css" as="styles">
    <!-- vincula los archivos -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preload" href="../css/style.css" as="styles" />
    <!-- vincula los archivos -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- <script> src = "../javascript/javascript.js" </script> -->
    <title>Dashboard</title>
</head>

<body>

    <div class="container-menu-lateral">
        <div class="sidebar">
            <div class="sidebar-logo">
                <a href="./dashboard.php"><img src="../imagenes/logo.png" alt=""></a>
            </div>

            <hr>
            <h3>Username: <span>nombre-user</span></h3>
            <hr>
            <div class="btn-sidebar">
                <!-- admin -->
                <a href="./mostrar_empleados.php">Empleados</a>
                <!-- admin -->
                <a href="./mostrar_clientes.php">Clientes</a>
                <!-- empleado -->
                <a href="#">Citas</a>
                <!-- empleado -->
                <a href="#">Productos</a>
                <!-- empleado -->
                <a href="./mostrar_proveedores.php">Proveedores</a>
                <!-- empleado -->
                <a href="#">Historial de citas</a>
            </div>

        </div>

    </div>
    <div class="main-content">
        <header class="header">
            <div class="btn-cerrar-sesion btn"><a href="#">Cerra sesión</a></div>
        </header>
    </div>
</body>

</html>