<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar proveedor</title>
    <!-- <script src="../javascript/javascript.js"></script> -->

</head>

<body>
    <?php include "menu_panel.php"; ?>
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>REGISTRAR NUEVO PROVEEDOR</h3>
        </div>

        <div class="content-info">

            <div class="content-registrar formulario">
                <form action="../php/create_proveedor.php" method="post">
                    <label for="">Los campos con <span>*</span> son obligatorios.</label><br>
                    <fieldset>
                        <legend>Información de la empresa</legend>
                        <!-- nombre -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input required name="nombre" type="text" placeholder="Escribe el nombre de la empresa Ej.Miller&Marc"><br><br>
                        <!-- Dirección -->
                        <label for="">Dirección<span>*</span></label><br>
                        <input required name="direccion" type="text" placeholder="Escribe la dirección de la empresa"><br><br>
                    </fieldset>
                    <fieldset>
                        <legend>Información del trabajador de la empresa</legend>
                        <!-- Nombre del trabajador -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input pattern="[a-zA-Z\s]{3,254}" required name="contacto" type="text" placeholder="Ingresa el nombre del trabajador de la empresa"><br><br>
                        <!-- telefono del trabajador-->
                        <label for="">Teléfono<span>*</span></label><br>
                        <input id="telefono" pattern="[0-9]{10}" maxlength="10" required placeholder="Ingresa el numero celular Ejemplo.9999123456" title="Ejemplo: 9999123456" name="telefono" type="tel"><br><br>
                        <!-- Correo del trabajador -->
                        <label for="">Correo electronico<span>*</span></label><br>
                        <input required name="correo" type="email" placeholder="Ingrese el correo electronico del empleado"><br><br>
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