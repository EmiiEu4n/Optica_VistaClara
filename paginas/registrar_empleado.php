<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar empleado</title>
</head>

<body>
    <?php include "menu_panel.php";
    ?>
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>REGISTRAR NUEVO EMPLEADO</h3>
        </div>
        <div class="content-info">


            <div class="content-registrar formulario">
                <form action="../php/create_empleado.php" method="post">

                    <label for="">Los campos con <span>*</span> son obligatorios.</label><br>
                    <fieldset>
                        <legend>Información del empleado</legend>
                        <!-- Nombre -->
                        <label for="">Nombre(s)<span>*</span></label><br>
                        <input required name="nombres" type="text" placeholder="Ingrese el nombre"><br><br>

                        <!-- Apellido -->
                        <label for="">Apellidos<span>*</span></label><br>
                        <input required name="apellidos" type="text" placeholder="Ingrese los apellidos"><br><br>

                        <!-- Domicilio-->
                        <label for="">Domicilio<span>*</span></label><br>
                        <input required name="direccion" type="text" placeholder="Ingrese el domicilio"><br><br>
                    </fieldset>
                    <fieldset>
                        <legend>Contactos del empleado</legend>
                        <!-- Telefono -->
                        <label for="">Telefono<span>*</span></label><br>
                        <input pattern="[0-9]{10}" maxlength="10" required name="telefono" type="tel" placeholder="Ingresa el numero celular ej. 9999123456"><br><br>

                        <!-- Correo -->
                        <label for="">Correo<span>*</span></label><br>
                        <input required name="correo" type="text" placeholder="Ingrese el correo electronico"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Información de trabajo</legend>

                        <!-- usuario -->
                        <label for="">Username<span>*</span></label><br>
                        <input required name="username" type="text" placeholder="Ingrese el username"><br><br>

                        <!-- roles-->
                        <label for="">Rol<span>*</span></label><br>
                        <select required name="rol">
                            <!-- Opciones de rol -->
                            <option value="">Selecciona un rol</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Empleado">Empleado</option>

                        </select><br><br>

                        <!-- fecha de contratacion -->
                        <label for="">Fecha de contratación<span>*</span></label><br>
                        <input required name="fecha" type="date" placeholder="Ingrese la fecha de contratación"><br><br>


                        <!-- contraseña -->
                        <label for="">Contraseña(Temporal)*</label><br>
                        <input required name="contrasena" type="password" placeholder="Ingrese la contraseña temporal"><br>
                    </fieldset>


                    <!-- boton -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_empleados.php">Regresar</a>
                        </div>
                        <button class="btn-form">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>