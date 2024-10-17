<?php 
session_start();
if(isset($_SESSION['autentificado'])=="SI"){
    header("Location:./paginas/menu.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al normalize: Nos servira para que la consistencia entre navegadores sea ideal y exista minimos cambios en cuanto a que navegador vayamos abriendo el sitio web -->
    <link rel="preload" href="/css/normalize.css" as="styles">
    <!-- vincula los archivos -->
    <link rel="stylesheet" href="/css/normalize.css">

    <!--Enlace al css: El primero ayuda con la carga del archivo css para que se cargue anticipadamente en la cache-->
    <link rel="preload" href="/css/style.css" as="styles" />
    <!-- vincula los archivos -->
    <link rel="stylesheet" href="/css/style.css" />
    <title>Inicio de sesión</title>
</head>

<body>
    <div class="img-logo">
        <img class="img-logo" src="/imagenes/logo.png" alt="">
    </div>

    <div class="container-iniciar-sesion ancho">
        <!-- Titulo -->
        <h3>Iniciar Sesión</h3>
        <!-- Mensaje de error -->
        <?php
        $errorusuario = isset($_GET["errorusuario"]);
        if ($errorusuario == "SI") {
            echo '<h4 class = "avisoerror"> Datos incorrectos</h4>';
        }
        ?>
        <form action="./php/autentificar.php" method="post">
            <!-- Usuario -->
            <label for="">Usuario:</label><br>
            <input name="username" type="text" placeholder="Ingresa tu usuario">
            <br><br>
            <!-- Contraseña -->
            <label for="">Contraseña:</label><br>
            <input name="contrasena" type="password" placeholder="Ingresa tu contraseña">
            <br><br>
            <!-- Boton -->
            <button class="btn-form">Inicia Sesión</button>
        </form>
    </div>
</body>

</html>