<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver categoria</title>
</head>

<body>
    <?php 
    include "menu_panel.php";
    require "../php/conexion.php";
    //get de origen
    $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
    $id = $_GET['id'];
    $categoria = "SELECT * FROM categorias WHERE id_categoria = '$id'";
    $query = mysqli_query($conectar, $categoria); 
    $info = $query -> fetch_array();
    ?>

    
    <div class="ver-producto-content main-content">
        <div class="titulo">
            <h3>Categoria </h3>
        </div>


        <div class="content-info">
            <div class="info formulario">
                <!-- informacion del cliente -->
                <fieldset>
                    <legend>Información de la categoria</legend>
                    <!-- Nombres -->
                    <label for="">Nombre:</label>
                    <p><?php echo $info['nombre_categoria'] ?></p>
                </fieldset>
            </div>

        </div>
        <div class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="./mostrar_categoria.php">Regresar</a>
            </div>
            <div class="btn">
                <a href="../paginas/editar_categoria.php?origen=<?php echo $origen ?>ver&id=<?php echo $id ?>">Editar</a>
            </div>
        </div>

    </div>
</body>

</html>