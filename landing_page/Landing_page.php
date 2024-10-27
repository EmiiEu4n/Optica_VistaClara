<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Óptica Vista Clara</title>
    <link rel="stylesheet" href="estilo.css">
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
    <div class="contenedor1">
        <div class="caja tamaño">
            <img src="../imagenes/logo2.png" alt="Logo Óptica Vista Clara">
        </div>
        <h2>Óptica Vista Clara</h2>
        <div class="caja1">
            <a href="#aqui1">Inicio</a>
            <a href="#aqui2">Servicios</a>
            <a href="#aqui3">Productos</a>
            <a href="#aqui4">Conócenos</a>
            <a href="#aqui5">Contacto</a>
        </div>
    </div>

    <!-- Bienvenida -->
    <div class="contenedor2 tamaño1" id="aqui1">
        <div class="caja2 tamaño1">
            <br><br><br><br><br><br><br><br>
            <h1>Tu visión, nuestra pasión</h1>
            <br>
            <h4>Descubre una nueva forma de ver el mundo con Óptica Visión Clara</h4>
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
        <h1>Contáctanos</h1>
        <br>
        <div class="caja6">
            <form action="#" name="contenedorformulario" method="post">
                <input type="text" name="nombre" placeholder="Nombre Completo"><br>
                <input type="email" name="email" placeholder="Correo Electrónico"><br>
                <input type="tel" name="celular" maxlength="10" placeholder="Teléfono"><br>
                <textarea name="comentarios" placeholder="Mensaje"></textarea><br>
                <input type="button" class="Btn" value="Enviar" onclick="valida_enviar()">
            </form>
        </div>
        <div class="caja6">
            <ul>
                <li><img src="../imagenes/telefono.png" alt="">+34 123 456 789</li>
                <li><img src="../imagenes/mensaje.png" alt="">info@opticavision.com</li>
                <li><img src="../imagenes/ubicacion.png" alt="">Calle Principal 123, Ciudad</li>
                <li><img src="../imagenes/reloj.png" alt="">Lun - Vie: 9:00 - 20:00, Sáb: 10:00 - 14:00</li>
            </ul>
        </div>
    </div>

    <!-- Pie de página -->
    <div class="contenedor7">
        <br><br>
        <h4>© 2024 Óptica Vista Clara. Todos los derechos reservados.</h4>
    </div>

</body>
</html>
