<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
</head>

<body>
    <?php include "menu_panel.php"; ?>
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>REGISTRAR NUEVO PRODUCTO</h3>
        </div>

        <div class="content-info">

            <div class="content-registrar formulario">
                <form action="#" method="post"> 
                    <fieldset>
                        <legend>Información de la empresa</legend>
                        <!-- nombre -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input required name="nombre" type="text" placeholder="Escribe el nombre de la empresa"><br><br>
                        <!-- Dirección -->
                        <label for="">Dirección<span>*</span></label><br>
                        <input required name="direccion" type="text" placeholder="Escribe la dirección"><br><br>
                        
                    </fieldset>
                    <fieldset>
                        <legend>Información del trabajador</legend>
                        <!-- Nombre del trabajador -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input required name="contacto" type="text" placeholder="Ingresa el nombre del trabajador"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Contacto del trabajador</legend>
                        <!-- Correo del trabajador -->
                        <label for="">Correo<span>*</span></label><br>
                        <input required name="correo" type="text" placeholder="Ingrese el correo electronico del trabajador"><br><br>
                        <!-- telefono -->
                        <label for="">Teléfono<span>*</span></label><br>
                        <input id="telefono" pattern="[0-9]{10}" maxlength="10" required placeholder="Ingresa el numero celular ej. 9999123456" name="telefono" type="tel"><br><br>
                    </fieldset>
                    <fieldset>
                        <legend>Producto suministrado</legend>
                        <!-- Suministro-->
                        <label for="">Suministro<span>*</span></label><br>
                        <input required name="suministro" type="text" placeholder="Escribe el nombre del suministro"><br><br>

                    </fieldset>


                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_productos.php">Regresar</a>
                        </div>
                        <button class="btn-registrar-usuario btn-form">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>