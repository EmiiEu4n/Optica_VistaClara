<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar empleado</title>
</head>

<body>
    <?php include "menu_panel.php";
    if($_SESSION['rol'] != 'Administrador'){
        header("Location: ../paginas/dashboard.php");
     }
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
                        <input pattern="[a-zA-Z\s]{3,254}" required name="nombres" type="text" placeholder="Escribe el/los nombres del empleado Ej. José Francisco"><br><br>

                        <!-- Apellido -->
                        <label for="">Apellidos<span>*</span></label><br>
                        <input pattern="[a-zA-Z\s]{3,254}" required name="apellidos" type="text" placeholder="Escribe los apellidos del empleado Ej.Escamilla Gonzalez"><br><br>

                        <!-- Domicilio-->
                        <label for="">Domicilio<span>*</span></label><br>
                        <input required name="direccion" type="text" placeholder="Ingrese la dirección del empleado"><br><br>
                    </fieldset>
                    <fieldset>
                        <legend>Contactos del empleado</legend>
                        <!-- Telefono -->
                        <label for="">Telefono<span>*</span></label><br>
                        <input pattern="[0-9]{10}" title="Ejemplo: 9999123456" maxlength="10" required name="telefono" type="tel" placeholder="Ingresa el numero celular Ej.9999123456"><br><br>

                        <!-- Correo -->
                        <label for="">Correo<span>*</span></label><br>
                        <input required name="correo" type="text" placeholder="Escribe el correo electronico Ej.empleado@empresa.com"><br><br>
                    </fieldset>

                    <fieldset>
                        <legend>Información de trabajo</legend>

                        <!-- usuario -->
                        <label  for="">Username<span>*</span></label><br>
                        <input pattern="[a-zA-Z]{3,254}" title="NO usar espacios y numeros Ejemplo: emiliano" required name="username" type="text" placeholder="Ingrese el username Ej.franco"><br><br>

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
                        <input required name="fecha" type="date"><br><br>


                        <!-- contraseña -->
                        <label for="">Contraseña(Temporal)*</label><br>
                        <input required name="contrasena" type="password" placeholder="Ingrese la contraseña temporal del empleado"><br>
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