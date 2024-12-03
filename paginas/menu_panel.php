<?php
require '../php/seguridad.php';
require '../php/conexion.php';
// session_start();
$query_empleado = "SELECT rol, usuario FROM empleados WHERE id_empleado = ? LIMIT 1";
$consulta_empleado = $conectar->prepare($query_empleado);
$consulta_empleado->bind_param("s", $_SESSION['id']); //intercambiar los ? por los datos
$consulta_empleado->execute(); //realizar la consulta
$resultado_empleado = $consulta_empleado->get_result();
$info_empleado = $resultado_empleado->fetch_assoc();
$_SESSION['rol'] = $info_empleado['rol'];

if ($resultado_empleado->num_rows > 0) {

    if ($_SESSION['rol'] == 'Administrador') {
        $options = '
        <!-- admin -->
        <a href="./mostrar_empleados.php">Empleados</a>
        <!-- admin -->
        <a href="./mostrar_clientes.php">Clientes</a>
        <!-- admin -->
        <a href="./mostrar_usuarios.php">Usuarios</a>
        <!-- empleado -->
        <a href="./mostrar_productos.php">Productos</a>
        <!-- empleado -->
        <a href="./mostrar_proveedores.php">Proveedores</a>
        <!-- empleado -->
        <a href="./mostrar_citas.php">Gestion de citas</a>
        <!-- empleado -->
        <!--<a href="#">Historial de citas</a>-->
    ';
    } else if ($_SESSION['rol'] == 'Empleado') {
        $options = '
        <!-- empleado -->
        <a href="./mostrar_clientes.php">Clientes</a>
        <!-- empleado -->
        <a href="./mostrar_productos.php">Productos</a>
        <!-- empleado -->
        <a href="./mostrar_proveedores.php">Proveedores</a>
        <!-- empleado -->
        <a href="./mostrar_citas.php">Gestión de citas</a>
        <!-- empleado -->
        <!--<a href="#">Historial de citas</a>-->
        ';
    }
} else {
    require "../php/salir.php";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Preload archivos CSS críticos -->
    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="preload" href="../css/style.css" as="style">

    <!-- Vincular archivos CSS -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- SweetAlert2 CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<title>Dashboard</title>
</head>

<body>

    <div class="container-menu-lateral">
        <div class="sidebar">
            <div class="sidebar-logo">
                <a href="./dashboard.php"><img src="../imagenes/logo.png" alt=""></a>
            </div>

            <hr>
            <h3>Username: <?php echo $info_empleado['usuario'] ?></h3>
            <hr>
            <div class="btn-sidebar">
                <?php echo $options ?>
            </div>

            <div class="icon-container">
                <i class="material-icons">person</i> <!-- Ejemplo de ícono de Font Awesome -->
                <a href="./perfil_empleado.php">Perfil</a>
            </div>

        </div>
    </div>

    <div class="main-content">
        <header class="header">
            <div class="btn-cerrar-sesion btn"><a href="../php/salir.php">Cerra sesión</a></div>
        </header>
    </div>

    <!-- Scripts al final del body para optimización de carga -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script src="../javascript/sweetalert2.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../javascript/notificaciones.js" defer></script>
    <script src="../javascript/validacion.js" defer></script>
</body>

</html>