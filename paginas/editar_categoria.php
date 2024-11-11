<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoría</title>
</head>

<body>
    <?php 
    include "menu_panel.php"; 
    include "../php/notificaciones.php";


    //Notificaciones
    if (isset($_SESSION["icon"])) {
        notify();
    }
    //get de origen
    $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
    ?>
    <!-- Manteniendo el menú si es necesario -->
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>EDITAR CATEGORIA</h3>
        </div>

        <?php
          require "../php/conexion.php";
          $id = $_GET['id'];
          $ver_producto = "SELECT * FROM categorias WHERE id_categoria = '$id'";
          $resultado = mysqli_query($conectar, $ver_producto);

          $fila = $resultado->fetch_array();
        //   echo $fila ["nombre"];
          ?>


        <div class="content-info">
            <div class="content-registrar formulario">
                <form action="../php/update_categoria.php" method="post">
                    <fieldset>
                        <legend>Información de la categoria</legend>
                        <!-- Nombre -->
                        <label for="">Nombre:<span>*</span></label><br>
                        <input pattern="[a-zA-Z0-9\s]{3,254}" required name="nombre_categoria" type="text" placeholder="Categoria" value="<?php echo "$fila[nombre_categoria]" ?>"><br><br>
                        <input name="id_categoria" type="hidden" value="<?php echo $id?>">
                    </fieldset>
                        

                    <!-- Botones -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                        <a href="<?php echo ($origen == 'categorias')? './mostrar_categoria.php':'./ver_categoria.php?id=' . $id?>">Regresar</a>
                        </div>
                        <button class="btn-form" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
