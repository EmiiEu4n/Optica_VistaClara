<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoría</title>
</head>

<body>
    <?php include "menu_panel.php"; ?>
    <!-- Manteniendo el menú si es necesario -->
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>EDITAR CATEGORIA</h3>
        </div>
        <div class="content-info">
            <div class="content-registrar formulario">
                <form action="#" method="post">
                    <fieldset>
                        <legend>Información de la categoria</legend>
                        <!-- Nombre -->
                        <label for="">Nombre:<span>*</span></label><br>
                        <input required name="nombre_categoria" type="text" placeholder="AQUI VA UN ECHO LLAMANDO LOS DATOS YA ALMACENADOS"><br><br>
                    </fieldset>
                        

                    <!-- Botones -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_categoria.php">Regresar</a>
                        </div>
                        <button class="btn-form" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
