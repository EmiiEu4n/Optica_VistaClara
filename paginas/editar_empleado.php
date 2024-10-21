<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar empleado</title>
</head>

<body>
    <?php
    include "menu_panel.php";
    require "../php/conexion.php";
    $id = $_GET['id'];

    // instruccion
    $usuario = "SELECT * FROM empleados WHERE id_empleado = '$id'";

    // consulta
    $query = mysqli_query($conectar, $usuario);

    $info = $query->fetch_array();

    // recuperar informacion
    $antiguoCorreo = $info['correo'];
    $antiguoUsername = $info['usuario'];
    ?>


    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>Empleado: <span><?php echo $info['nombres'] . " " . $info['apellidos'] ?></span></h3>
        </div>

        <div class="content-info">
            <div class="content-edit formulario">
                <form action="/php/update_empleado.php" method="post">

                    <label for="">Los campos con <span>*</span> son obligatorios.</label><br>
                    <fieldset>
                        <legend>Información del empleado</legend>
                        <!-- Nombre -->
                        <label for="">Nombre(s)<span>*</span></label><br>
                        <input pattern="[a-zA-Z\s]{3,254}" value="<?php echo $info['nombres']; ?>" required name="nombres" type="text" placeholder="Ingrese el/los nombres del empleado Ej. José Miguel"><br><br>

                        <!-- Apellido -->
                        <label for="">Apellidos<span>*</span></label><br>
                        <input pattern="[a-zA-Z\s]{3,254}" value="<?php echo $info['apellidos']; ?>" required name="apellidos" type="text" placeholder="Ingrese los apellidos del empleado Ej. Perez González"><br><br>

                        <!-- Domicilio-->
                        <label for="">Domicilio<span>*</span></label><br>
                        <input value="<?php echo $info['direccion']; ?>" required name="direccion" type="text" placeholder="Ingrese la dirección del domicilio"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Contactos del empleado</legend>

                        <!-- Telefono -->
                        <label for="">Telefono<span>*</span></label><br>
                        <input pattern="[0-9]{10}" title="Ejemplo: 9999123456" maxlength="10" value="<?php echo $info['telefono']; ?>" required name="telefono" type="tel" placeholder="Ingresa el numero celular ej. 9999123456"><br><br>

                        <!-- Correo -->
                        <label for="">Correo<span>*</span></label><br>
                        <input value="<?php echo $info['correo']; ?>" required name="correo" type="email" placeholder="Ingrese el correo electronico Ej.cliente@gmail.com"><br><br>

                    </fieldset>

                    <fieldset>
                        <legend>Información de trabajo</legend>
                        
                        <!-- usuario -->
                        <label for="">Username<span>*</span></label><br>
                        <input pattern="[a-zA-Z]{3,254}" title="NO usar espacios y numeros Ejemplo: emiliano" value="<?php echo $info['usuario']; ?>" required name="username" type="text" placeholder="Ingrese el username Ej.Jose NO usar espacios y numeros"><br><br>

                        <!-- roles-->
                        <label for="">Rol<span>*</span></label><br>
                        <select name="rol">
                            <!-- Opciones de rol -->
                            <!-- <option value="<?php echo $info['rol']; ?>"><?php echo $info['rol']; ?></option> -->
                            <option value="Administrador"
                            <?php
                                    //inicio de if para seleccionar el autor
                                    if ( $info['rol'] == "Administrador") {
                                        echo "selected";
                                    }
                                    //fin de if
                                    ?>
                            >Administrador</option>

                            <option value="Empleado"
                            <?php
                                    //inicio de if para seleccionar el autor
                                    if ($info['rol'] == "Empleado") {
                                        echo "selected";
                                    }
                                    //fin de if
                                    ?>
                            >Empleado</option>
                            
                        </select><br><br>
                        
                        <!-- fecha de contratacion -->
                        <label for="">Fecha de contratación<span>*</span></label><br>
                        <input value="<?php echo $info['fecha_contratacion']; ?>" required name="fecha" type="date"><br><br>
                        
                    </fieldset>

                    <!-- contraseña -->
                    <label class="btn-resetear-contrasena" for="">¿NO recuerda su contraseña? <a href="#"> Cambiar contraseña</a></label><br>
                    
                    <!-- boton -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_empleados.php">Regresar</a>
                        </div>
                        <button class="btn-form">Guardar</button>
                    </div><br><br>


                    <!-- Enviar ID -->
                    <input type="hidden" name="id" value="<?php echo $info['id_empleado'] ?>">

                    <!-- Usuario y contraseña antigua -->
                    <input type="hidden" value="<?php echo $antiguoCorreo ?>" name="a_correo">
                    <input type="hidden" value="<?php echo $antiguoUsername ?>" name="a_username">
                </form>

            </div>
        </div>
    </div>
</body>

</html>