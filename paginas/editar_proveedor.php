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
    require "../php/conexion.php";
    $id = $_GET['id'];

    // instruccion
    $proveedor = "SELECT * FROM proveedores WHERE id_proveedor = '$id'";

    // consulta
    $query = mysqli_query($conectar, $proveedor);

    $info = $query->fetch_array();
    ?>

    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>Proveedor: <?php echo $info['nombre']?></h3>
        </div>

        <div class="content-info">
            <div class="content-edit formulario">
                <form action="../php/update_proveedor.php" method="post">

                    <label for="">Los campos con <span>*</span> son obligatorios.</label><br>
                    <fieldset>
                        <legend>Información de la empresa</legend>
                        <!-- Nombre -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input value="<?php echo $info['nombre'] ?>" required name="nombre" type="text" placeholder="Ingrese el nombre de la empresa Ej.Grupo OMK"><br><br>

                        <!-- Dirección-->
                        <label for="">Dirección<span>*</span></label><br>
                        <input value="<?php echo $info['direccion'] ?>" required name="direccion" type="text" placeholder="Ingrese la dirección de la empresa"><br><br>

                    </fieldset>
                    
                    <fieldset>
                        <legend>Información del trabajador</legend>
                        <!-- Nombre -->
                        <label for="">Nombre<span>*</span></label><br>
                        <input pattern="[a-zA-Z\s]{3,254}" value="<?php echo $info['contacto'] ?>" required name="contacto" type="text" placeholder="Ingrese el nombre del trabajador Ej. José Manuel"><br><br>
                        
                        <!-- Telefono -->
                        <label for="">Telefono<span>*</span></label><br>
                        <input pattern="[0-9]{10}" maxlength="10" title="Ejemplo: 9999123456" value="<?php echo $info['telefono'] ?>" required name="telefono" type="tel" placeholder="Ingresa el numero celular Ej.9999123456"><br><br>
                        
                        <!-- Correo -->
                        <label for="">Correo electronico<span>*</span></label><br>
                        <input value="<?php echo $info['correo'] ?>" required name="correo" type="email" placeholder="Ingrese el correo electronico del trabajador Ej.contacto@empresa.com"><br><br>
                    </fieldset>

                    <!-- boton -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_proveedores.php">Regresar</a>
                        </div>
                        <button class="btn-form">Guardar</button>
                    </div><br><br>
                    <!-- Enviar id -->
                    <input type="hidden" name="id" value="<?php echo $info['id_proveedor'] ?>">

                </form>

            </div>
        </div>
    </div>
</body>

</html>