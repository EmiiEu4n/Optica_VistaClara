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
            <i class="fa-solid fa-bullseye" style="font-size: 48px;"></i>
            <h4>Lentes de Contacto</h4>
            <p>Adaptación y seguimiento para tu máxima comodidad.</p>
        </div>
    </div>

    <!-- Productos -->

        <?php include "lentes.php"; ?>


    <!-- Conócenos -->
    <div class="contenedor5" id="aqui4">
        <div class="caja5_1">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/tH-JxECXPpg?si=o-54CNFys2hUTN8x" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
           <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.667158321636!2d-89.62592300280646!3d20.965877551316165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5671626e1ce385%3A0x20788a3e7e48f5f0!2s%C3%93PTICA%20VISTA!5e0!3m2!1ses!2smx!4v1733200179926!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <ul class="info">
                <h2>Visítanos en nuestra tienda</h2><br>
                <p>Estamos ubicados en el corazón de la ciudad,<br> fácilmente accesible por transporte público y <br> con estacionamiento cercano.</p><br>

                <!-- Teléfono -->
                <i class="fas fa-phone-alt"></i><span> +52 999 912 3456</span><br><br>

                <!-- Correo electrónico -->
                <i class="fas fa-envelope"></i><span> info@opticavistaclara.com</span><br><br>

                <!-- Ubicación -->
                <i class="fas fa-map-marker-alt"></i><span> C. 62 Local 2 Entre Calle 63 y 65, Centro, 97000 Mérida, Yuc.</span><br><br>

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