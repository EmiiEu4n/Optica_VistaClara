<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
</head>

<body>
    <?php
    include "menu_panel.php";
    require "../php/conexion.php";
    $id = $_GET['id'];

    // instruccion
    $usuario = "SELECT * FROM clientes WHERE id_cliente = '$id'";
    // consulta
    $query = mysqli_query($conectar, $usuario);

    $info = $query->fetch_array();

    // recuperar informacion
    $antiguoCorreo = $info['correo'];
    $antiguoVerificado = $info['verificado'];
    ?>


    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>Cliente: <span><?php echo $info['nombres'] . " " . $info['apellidos'] ?></span></h3>
        </div>

        <div class="content-info">
            <div class="content-edit formulario">
                <form action="/php/update_cliente.php" method="post">
                    <fieldset>
                        <legend>Información del cliente</legend>
                        <!-- nombre -->
                        <label for="">Nombre(s):</label><br>
                        <input required name="nombres" type="text" placeholder="Ingresa los nombres" value="<?php echo $info['nombres'] ?>"><br><br>


                        <!-- apellidos -->
                        <label for="">Apellidos:</label><br>
                        <input required name="apellidos" type="text" placeholder="Ingresa los apellidos" value="<?php echo $info['apellidos'] ?>"><br><br>

                        <!-- direccion -->
                        <label for="">Domicilio</label><br>
                        <input placeholder="Escribe la direccion del domicilio" required name="direccion" type="text" value="<?php echo $info['direccion'] ?>"><br><br>


                    </fieldset>
                    <fieldset>
                        <legend>Contactos del cliente</legend>

                        <!-- correo -->
                        <label for="">correo:</label><br>
                        <input required name="correo" type="email" placeholder="Escribe el correo electronico EJ. cuenta@cuenta.com" value="<?php echo $info['correo'] ?>"><br><br>

                        <!-- telefono -->
                        <label for="">Telefono:</label><br>
                        <input pattern="[0-9]{10}" maxlength="10" required name="telefono" type="tel" placeholder="Ingresa el numero celular ej. 9999123456" value="<?php echo $info['telefono'] ?>"><br><br>

                    </fieldset>
                    <fieldset>
                        <legend>Información Médica</legend>

                        <!-- Preescripcion -->
                        <label for="">Preescripcion:</label><br>
                        <textarea placeholder="Ingresa información sobre la receta ej.Medida de la graduación" required name="preescripcion"><?php echo $info['preescripcion'] ?></textarea><br>
                    </fieldset>
                    <!-- Verificación oculta para empleado -->
                    <!-- <fieldset>
                        <legend>Dar de alta</legend>
                        <select name="verificacion" id="">
                            <option value="<?php echo $info['verificado'] ?>"><?php echo $info['verificado'] ?></option>
                            <option value="False">False</option>
                            <option value="True">True</option>

                        </select>
                    </fieldset> -->

                    <!-- contraseña -->
                    <label class="btn-resetear-contrasena" for="">¿El cliente NO recuerda su contraseña? <a href="#"> Cambiar contraseña</a></label><br>

                    <!-- botones -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="mostrar_clientes.php">Regresar</a>
                        </div>
                        <button class="btn-form">Guardar</button>
                    </div>


                    <!-- Enviar ID -->
                    <input type="hidden" name="id" value="<?php echo $info['id_cliente'] ?>">

                    <!-- Usuario y contraseña antigua -->
                    <input type="hidden" value="<?php echo $antiguoCorreo ?>" name="a_correo">
                    <input type="hidden" value="<?php echo $antiguoVerificado ?>" name="a_verificado">
                </form>

            </div>
        </div>
    </div>
</body>

</html>