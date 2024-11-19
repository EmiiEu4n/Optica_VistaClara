<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar proveedor</title>
    <!-- <script src="../javascript/javascript.js"></script> -->

</head>

<body>
    <?php include "menu_panel.php";
    //Notificaciones
    include "../php/notificaciones.php";
    if (isset($_SESSION["icon"])) {
        notify();
    }
    ?>
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>REGISTRAR NUEVO PROVEEDOR</h3>
        </div>

        <div class="content-info">

            <div class="content-registrar formulario">
                <form action="../php/create_proveedor.php" method="post">
                    <label for="">Los campos con <span>*</span> son obligatorios.</label><br><br>
                    <fieldset>
                        <legend>Información de la empresa</legend>
                        <!-- nombre -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input class="validar-espacios" required name="nombre" type="text" placeholder="Nombre de la empresa (Ej. Miller&Marc)"><br><br>
                        <!-- direccion -->
                        <label for="">Dirección<span>*</span></label><br>
                        <input class="validar-espacios" pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s\.\-\#\/\°]+$" required name="direccion" type="text" placeholder="Dirección de la empresa" minlength="5" maxlength="150">
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Información del trabajador de la empresa</legend>
                        <!-- Nombre del trabajador -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input class="validar-espacios" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,254}" required name="contacto" type="text" placeholder="Nombre del trabajador"><br><br>
                        <!-- telefono del trabajador-->
                        <label for="">Teléfono<span>*</span></label><br>
                        <input class="validar-espacios" id="telefono" pattern="[0-9]{10}" maxlength="10" required placeholder="Número de celular (Ej. 9999123456)" title="Ejemplo: 9999123456" name="telefono" type="tel"><br><br>
                        <!-- Correo del trabajador -->
                        <label for="">Correo electronico<span>*</span></label><br>
                        <input class="validar-espacios" required name="correo" type="email" placeholder="Correo electrónico del trabajador"><br><br>
                    </fieldset>

                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_proveedores.php">Regresar</a>
                        </div>
                        <button class="btn-registrar-usuario btn-form">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>