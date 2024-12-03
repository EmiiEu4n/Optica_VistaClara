<!DOCTYPE html>
<html lang="es">

<head>
<link rel="stylesheet" href="estilos_landing.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Óptica Vista Clara</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .caja3 i {
            color: #8577ED;
            /* Color del ícono */
            margin-bottom: 10px;
            /* Espacio debajo del ícono */
        }

        .caja3 h4 {
            font-size: 20px;
            color: #333;
        }

        .caja3 p {
            color: #555;
            font-size: 16px;
        }
    </style>

</head>

<body>

    <!-- Encabezado -->

    <?php 
    include "Encabezado.php";

    $btn_dinamic = (isset($_SESSION['cliente_autentificado']) && $_SESSION['cliente_autentificado'] == "SI") ? '' : '<a href="../index.php?origen=landing" class="BtnAC"><i class="fa-regular fa-calendar-check"> </i>   Agendar cita</a>';
    include "../php/notificaciones.php";
    if (isset($_SESSION["icon"])) {
        notify();
    } ?>

    <!-- Bienvenida -->
    <div class="contenedor2 tamaño1" id="aqui1">
        <div class="caja2 tamaño1">
            <br><br><br><br><br><br><br>
            <h1>TU VISIÓN, NUESTRA PASIÓN</h1>
            <br>
            <h4>Descubre una nueva forma de ver el mundo con Óptica Visión Clara</h4>
            <br>
            <?php echo $btn_dinamic ?>
        </div>
    </div>


    <!-- Servicios -->
    <div class="contenedor3" id="aqui2">
        <br><br>
        <h1>Nuestros Servicios</h1>
        <br>
        <div class="caja3">
            <i class="fas fa-eye" style="font-size: 48px;"></i>
            <h4>Examen de Vista</h4>
            <p>Evaluaciones completas con tecnología de vanguardia.</p>
        </div>
        <div class="caja3">
            <i class="fas fa-glasses" style="font-size: 48px;"></i>
            <h4>Montaje de Lentes</h4>
            <p>Ajuste perfecto para tus gafas con precisión milimétrica.</p>
        </div>
        <div class="caja3">
            <i class="fas fa-eye-dropper" style="font-size: 48px;"></i>
            <h4>Lentes de Contacto</h4>
            <p>Adaptación y seguimiento para tu máxima comodidad.</p>
        </div>
    </div>

    <!-- Productos -->
    <div class="contenedor4" id="aqui3">
        <br>
        <h1>Nuestros Productos</h1>
        <br><br>
        <?php include "lentes.php"; ?>
    </div>

    <!-- Conócenos -->
    <div class="contenedor5" id="aqui4">
        <div class="caja5_1">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/mB8oifYG7yY?si=w_zwwpA0NnQ7QnvW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="caja5_2">
            <h2>¿Quiénes Somos?</h2>
            <br>
            <p>En Óptica Vista Clara, contamos con un equipo de expertos optometristas y técnicos que se especializan en la evaluación y el tratamiento de tus necesidades visuales. Nos enorgullece ofrecer una amplia gama de servicios y productos diseñados para mejorar tu visión y tu calidad de vida.</p>
        </div>
    </div>

    <!-- Contáctanos -->
    <div class="contenedor6">
        <h1>Nuestra Ubicación</h1>
        <br>
        <div class="content-ubi">
            
        </div>
        <div class="caja6">
            <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29795.63750301002!2d-89.66632947276004!3d21.014485294122878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56733863546b79%3A0xe6fc87d55bcb3859!2sBen%20%26%20Frank!5e0!3m2!1ses-419!2smx!4v1717285680631!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <ul class="info">
                <h2>Visítanos en nuestra tienda</h2><br>
                <p>Estamos ubicados en el corazón de la ciudad,<br> fácilmente accesible por transporte público y <br> con estacionamiento cercano.</p><br>

                <!-- Teléfono -->
                <i class="fas fa-phone-alt"></i><span> +52 999 912 3456</span><br><br>

                <!-- Correo electrónico -->
                <i class="fas fa-envelope"></i><span> info@opticavistaclara.com</span><br><br>

                <!-- Ubicación -->
                <i class="fas fa-map-marker-alt"></i><span> Calle Principal 123, Ciudad</span><br><br>

                <!-- Horario -->
                <i class="fas fa-clock"></i><span> Lun - Sab: 10:00 am - 5:00 pm</span>
            </ul>



        </div>
    </div>
    <div class="contenedor9" id="aqui5">
        <h1>Contáctanos</h1>
        <br>
        <div class="caja7">
            <form action="../php/send_contactanos.php" name="contenedorformulario" method="post">
                <input autocomplete="off" required class="validar-espacios" type="text" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,254}" title="Ejemplo: José Martín Peréz González" placeholder="Nombre Completo"><br>
                <input autocomplete="off" required class="validar-espacios" type="email" name="email" placeholder="Correo Electrónico"><br>
                <input autocomplete="off" required class="validar-espacios" type="tel" name="celular" pattern="[0-9]{10}" maxlength="10" title="Ejemplo: 9999123456" placeholder="Teléfono"><br>
                <textarea autocomplete="off" required maxlength="150" class="validar-espacios" style="font-family: 'Roboto';" name="comentarios" placeholder="Mensaje"></textarea><br>
                <input type="submit" class="Btn raise" value="Enviar">
            </form>
        </div>

    </div>

    <!-- Pie de página -->
    <?php include "Piedepagina.php"; ?>
    <script src="../javascript/validacion.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../javascript/notificaciones.js" defer></script>
</body>

</html>