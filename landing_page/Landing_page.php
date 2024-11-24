<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Óptica Vista Clara</title>
    <link rel="stylesheet" href="estilos_landing.css">
    <script type="text/javascript">
        function valida_enviar() {
            if (document.contenedorformulario.nombre.value.length == 0) {
                alert("Tienes que escribir tu NOMBRE  :)");
                document.contenedorformulario.nombre.focus();
                return 0;
            }
            if (document.contenedorformulario.email.value.length == 0) {
                alert("Tienes que escribir tu CORREO  T_T");
                document.contenedorformulario.email.focus();
                return 0;
            }
            if (document.contenedorformulario.celular.value.length == 0) {
                alert("Tienes que escribir tu CELULAR >:v");
                document.contenedorformulario.celular.focus();
                return 0;
            }
            // Si todos los campos han validado correctamente, se envía el formulario
            document.contenedorformulario.submit();
        }
    </script>
</head>
<body>

    <!-- Encabezado -->

    <?php include "Encabezado.php"; ?>

    <!-- Bienvenida -->
    <div class="contenedor2 tamaño1" id="aqui1">
        <div class="caja2 tamaño1">
            <br><br><br><br><br><br><br><br>
            <h1>Tu visión, nuestra pasión</h1>
            <br>
            <h4>Descubre una nueva forma de ver el mundo con Óptica Visión Clara</h4>
            <br>
            <a class="BtnAC" href="">Agenda una cita</a>
        </div>
    </div>

    <!-- Servicios -->
    <div class="contenedor3" id="aqui2">
        <br><br>
        <h1>Nuestros Servicios</h1>
        <br>
        <div class="caja3">
            <img src="../imagenes/ojo1.png" alt="Examen de Vista">
            <h4>Examen de Vista</h4>
            <p>Evaluaciones completas con tecnología de vanguardia.</p>
        </div>
        <div class="caja3">
            <img src="../imagenes/lente1.png" alt="Montaje de Lentes">
            <h4>Montaje de Lentes</h4>
            <p>Ajuste perfecto para tus gafas con precisión milimétrica.</p>
        </div>
        <div class="caja3">
            <img src="../imagenes/ojo1.png" alt="Lentes de Contacto">
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
    <div class="contenedor6" id="aqui5">
        <h1>Nuestra Ubicación</h1>
        <br>
        <div class="caja6">
        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29795.63750301002!2d-89.66632947276004!3d21.014485294122878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56733863546b79%3A0xe6fc87d55bcb3859!2sBen%20%26%20Frank!5e0!3m2!1ses-419!2smx!4v1717285680631!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       
        
            <ul class="info">
                <h2>Visítanos en nuestra tienda</h2><br>
                <p>Estamos ubicados en el corazón de la ciudad,<br> fácilmente accesible por transporte público y <br> con estacionamiento cercano.</p><br>
                <img src="../imagenes/telefono.png" alt=""><span>+34 123 456 789</span> <br>
                <img src="../imagenes/mensaje.png" alt=""><span>info@opticavision.com </span><br>
                <img src="../imagenes/ubicacion.png" alt=""><span>Calle Principal 123, Ciudad</span> <br>
                <img src="../imagenes/reloj.png" alt=""><span>Lun - Vie: 9:00 - 20:00, Sáb: 10:00 - 14:00</span>
            </ul>
        </div>
    </div>
    <div class="contenedor9" id="aqui5">
        <h1>Contáctanos</h1>
        <br>
        <div class="caja7">
            <form action="#" name="contenedorformulario" method="post">
                <input type="text" name="nombre" placeholder="Nombre Completo"><br>
                <input type="email" name="email" placeholder="Correo Electrónico"><br>
                <input type="tel" name="celular" maxlength="10" placeholder="Teléfono"><br>
                <textarea name="comentarios" placeholder="Mensaje"></textarea><br>
                <input type="button"  class="Btn raise" value="Enviar" onclick="valida_enviar()">
            </form>
        </div>
       
    </div>

    <!-- Pie de página -->
    <?php include "Piedepagina.php"; ?>

</body>
</html>
