<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver producto</title>
</head>

<body>
    <?php 
    include "menu_panel.php";
    ?>
    <div class="ver-producto-content main-content">
        <div class="titulo">
            <h3>Proveedor:</span></h3>
        </div>


        <div class="content-info">
            <div class="info formulario">
                <!-- informacion de la empresa -->
                <fieldset>
                    <legend>Información de la empresa</legend>
                    <!-- Nombre -->
                    <label for="">Nombre:</label>
                    <p>#</p>
                    <!-- Dirección -->
                    <label for="">Dirección:</label><br>
                    <textarea disabled>#</textarea>
                </fieldset>

                <fieldset>
                    <legend>Información del trabajador</legend>
                    <label for="">Nombre:</label>
                    <p>#</p>
                </fieldset>

                <fieldset>
                    <legend>Contacto de trabajador</legend>
                    <!-- correo -->
                    <label for="">Correo:</label>
                    <p>#</p>
                    <!-- telefono -->
                    <label for="">Teléfono:</label>
                    <p>#</p>
                </fieldset>

                <!-- Suministro -->
                <fieldset>
                    <legend>Producto suministrado</legend>
                    <label for="">Suministro:</label>
                    <p>#</p>
                    
                </fieldset>


            </div>

        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="./mostrar_proveedoreres.php">Regresar</a>
            </div>
            <div class="btn">
                <a href="#">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>