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
    include "../php/notificaciones.php";
    $id = $_GET['id'];
    //get de origen
    $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
    $id_cita = isset($_GET['id_cita']) ? $_GET['id_cita'] : "";
    // instruccion
    $usuario = "SELECT * FROM clientes WHERE id_cliente = '$id'";
    // consulta
    $query = mysqli_query($conectar, $usuario);

    $info = $query->fetch_array();

    // recuperar informacion
    $antiguoCorreo = $info['correo'];
    $antiguoVerificado = $info['verificado'];

    //Notificaciones
    if (isset($_SESSION["icon"])) {
        notify();
    }

    ?>


    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>Cliente: <span><?php echo $info['nombres'] . " " . $info['apellidos'] ?></span></h3>
        </div>

        <div class="content-info">
            <div class="content-edit formulario">
                <form action="../php/update_cliente.php" method="post">
                    <label for="">Los campos con <span>*</span> son obligatorios.</label><br>

                    <fieldset>
                        <legend>Información del cliente</legend>
                        <!-- nombre -->
                        <label for="">Nombre(s) <span>*</span></label><br>
                        <input pattern="[a-zA-Z\s]{3,254}" required id="nombre" name="nombres" type="text" placeholder="Ingrese el nombre Ej. José Miguel" value="<?php echo $info['nombres'] ?>" class="validar-espacios"><br><br>


                        <!-- apellidos -->
                        <label for="">Apellidos <span>*</span></label><br>
                        <input pattern="[a-zA-Z\s]{4,254}" required id="apellido" name="apellidos" type="text" placeholder="Ingresa los apellidos Ej. Perez González" value="<?php echo $info['apellidos'] ?>" class="validar-espacios"><br><br>

                        <!-- direccion -->
                        <label for="">Domicilio <span>*</span></label><br>
                        <input placeholder="Escribe la direccion del domicilio" required id="direccion" name="direccion" type="text" value="<?php echo $info['direccion'] ?>" class="validar-espacios"><br><br>


                    </fieldset>
                    <fieldset>
                        <legend>Contactos del cliente</legend>

                        <!-- correo -->
                        <label for="">correo <span>*</span></label><br>
                        <input required name="correo" id="correo" type="email" placeholder="Escribe el correo electronico EJ. cuenta@cuenta.com" value="<?php echo $info['correo'] ?>" class="validar-espacios"><br><br>

                        <!-- telefono -->
                        <label for="">Telefono <span>*</span></label><br>
                        <input pattern="[0-9]{10}" maxlength="10" required id="telefono" name="telefono" type="tel" placeholder="Ingresa el numero celular ej. 9999123456" title="Ejemplo: 9999123456" value="<?php echo $info['telefono'] ?>" class="validar-espacios"><br><br>

                    </fieldset>
                    <fieldset>
                        <legend>Información Médica</legend>

                        <!-- Preescripcion -->
                        <label for="">Preescripcion <span>*</span></label><br>
                        <textarea style="width: 700px;" placeholder="Ingresa información sobre la receta Ej. Medida de la graduación máximo 150 caracteres" required id="prescripcion" name="prescripcion" class="validar-espacios" maxlength="150"><?php echo $info['preescripcion'] ?></textarea><br>
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
                    <!-- <label class="btn-resetear-contrasena" for="">¿El cliente NO recuerda su contraseña? <a href="#"> Cambiar contraseña</a></label><br> -->

                    <!-- botones -->
                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="<?php
                                        if ($origen == 'usuarios') {
                                            echo './mostrar_usuarios.php';
                                        } elseif ($origen == 'clientes') {
                                            echo './mostrar_clientes.php';
                                        } elseif ($origen == 'usuariosver') {
                                            echo './ver_cliente.php?origen=usuarios&id=' . $id;
                                        } elseif ($origen == 'clientesver') {
                                            echo './ver_cliente.php?origen=clientes&id=' . $id;
                                        } elseif ($origen == 'citasver') {
                                            echo './ver_cita.php?origen=citas&id=' . $id_cita;
                                        }
                                        ?>">Regresar</a>
                        </div>
                        <button style="width: 200px;" id="guardarCambios" class="btn-form" disabled>Guardar cambios</button>
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
    <script script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener los elementos del formulario
            const nombre = document.getElementById('nombre');
            const apellido = document.getElementById('apellido');
            const correo = document.getElementById('correo');
            const telefono = document.getElementById('telefono');
            const direccion = document.getElementById('direccion');
            const prescripcion = document.getElementById('prescripcion');
            const botonGuardar = document.getElementById('guardarCambios');

            // Guardar los valores originales en un objeto
            const valoresOriginales = {
                nombre: nombre.value,
                apellido: apellido.value,
                correo: correo.value,
                telefono: telefono.value,
                direccion: direccion.value,
                prescripcion: prescripcion.value
            };

            // Función para verificar si hay cambios
            function verificarCambios() {
                const valoresActuales = {
                    nombre: nombre.value,
                    apellido: apellido.value,
                    correo: correo.value,
                    telefono: telefono.value,
                    direccion: direccion.value,
                    prescripcion: prescripcion.value
                };

                // Comprobar si algún campo ha cambiado comparado con los valores originales
                const algunCambio = Object.keys(valoresOriginales).some(campo => valoresOriginales[campo] !== valoresActuales[campo]);

                // Habilitar o deshabilitar el botón en función de los cambios
                botonGuardar.disabled = !algunCambio;
            }

            // Añadir event listeners a todos los campos para verificar cambios en tiempo real
            nombre.addEventListener('input', verificarCambios);
            apellido.addEventListener('input', verificarCambios);
            correo.addEventListener('input', verificarCambios);
            telefono.addEventListener('input', verificarCambios);
            direccion.addEventListener('input', verificarCambios);
            prescripcion.addEventListener('input', verificarCambios);
        });
    </script>
</body>

</html>