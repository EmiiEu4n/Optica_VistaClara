<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar categoria</title>
</head>

<body>
    <?php 
    include "menu_panel.php" ?>
    <!-- Manteniendo el menú si es necesario -->
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>REGISTRAR NUEVA CATEGORÍA</h3>
        </div>
        <div class="content-info">
            <div class="content-registrar formulario">
                <form action="../php/create_categorias.php" method="post">
                    <fieldset>
                        <legend>Información de la categoria</legend>
                        <!-- Nombre -->
                        <label for="">Nombre de la categoria<span>*</span></label><br>
                        <input required name="nombre_categoria" type="text" placeholder="Ingrese el nombre"><br><br>

                    </fieldset>

                   
                    <!-- Botones -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_categoria.php">Regresar</a>
                        </div>
                        <button class="btn-form" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
