<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar proveedor</title>
</head>

<body>
<?php
    include "menu_panel.php";
    ?>

    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>Proveedor:</span></h3>
        </div>

        <div class="content-info">
            <div class="content-edit formulario">
                <form action="#" method="post">

                    <label for="">Los campos con <span>*</span> son obligatorios.</label><br><br>
                    <fieldset>
                        <legend>Información de la empresa</legend>
                        <!-- Nombre -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input value="#" required name="nombre" type="text" placeholder="Ingrese el nombre de la empresa"><br><br>

                        <!-- Dirección-->
                        <label for="">Dirección<span>*</span></label><br>
                        <input value="#" required name="direccion" type="text" placeholder="Ingrese la dirección de la empresa"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Información del trabajador</legend>
                        <!-- Nombre -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input value="#" required name="contacto" type="text" placeholder="Ingrese el nombre del trabajador"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Contactos del trabajador</legend>

                        <!-- Correo -->
                        <label for="">Correo<span>*</span></label><br>
                        <input value="#" required name="correo" type="email" placeholder="Ingrese el correo electronico del trabajador"><br><br>

                        <!-- Telefono -->
                        <label for="">Telefono<span>*</span></label><br>
                        <input pattern="[0-9]{10}" maxlength="10" value="#" required name="telefono" type="tel" placeholder="Ingresa el numero celular ej. 9999123456"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Producto suministrado</legend>
                        <!-- Suministro -->
                        <label for="">Suministro<span>*</span></label><br>
                        <input value="#" required name="suministro" type="text" placeholder="Escribe el nombre del suministro"><br><br>
                        
                        
                    </fieldset>

                    <!-- boton -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_proveedor.php">Regresar</a>
                        </div>
                        <button class="btn-form">Guardar</button>
                    </div><br><br>

                </form>

            </div>
        </div>
    </div>
</body>

</html>