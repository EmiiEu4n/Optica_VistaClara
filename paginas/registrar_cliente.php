<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar cliente</title>
</head>

<body>
    <?php include "menu_panel.php"; ?>
    <div class="nuevo-usuario main-content">
        <div class="titulo">
            <h3>REGISTRAR NUEVO CLIENTE</h3>
        </div>

        <div class="content-info">

            <div class="content-registrar formulario">
                <form action="/php/create_cliente.php" method="post">
                    <fieldset>
                        <legend>Información del cliente</legend>
                        <!-- nombre -->
                        <label for="">Nombre(s)<span>*</span></label><br>
                        <input pattern="[a-zA-Z\s]{3,254}" required name="nombres" type="text" placeholder="Escribe su nombre Ej. José Miguel"><br><br>
                        <!-- apellidos -->
                        <label for="">Apellidos<span>*</span></label><br>
                        <input pattern="[a-zA-Z\s]{3,254}" required name="apellidos" type="text" placeholder="Escribe los apellidos Ej.Pacheco González"><br><br>
                        <!-- direccion -->
                        <label for="">Domicilio<span>*</span></label><br>
                        <input required placeholder="Ingresa la direccion del domicilio" name="direccion" type="text"><br><br>
                        
                    </fieldset>
                    <fieldset>
                        <legend>Contactos del cliente</legend>
                        <!-- correo -->
                        <label for="">Correo<span>*</span></label><br>
                        <input required placeholder="Ingrese el correo electronico Ej.cliente@gmail.com" name="correo" type="email"><br><br>
                        <!-- telefono -->
                        <label for="">Telefono<span>*</span></label><br>
                        <input id="telefono" pattern="[0-9]{10}" title="Ejemplo: 9999123456" maxlength="10" required placeholder="Ingresa el numero celular ej.9999123456" name="telefono" type="tel"><br><br>

                    </fieldset>
                    <fieldset>
                        <legend>Información Médica</legend>
                        <!-- preescripcion -->
                        <label for="">Preescripcion<span>*</span></label><br>
                        <textarea required placeholder="Ingresa información sobre la receta Ej.Medida de la graduación" name="preescripcion"></textarea>
                        <br>
                    </fieldset>

                    <div class="opciones-btn opciones-btn-registrar">
                        <div class="btn">
                            <a href="./mostrar_clientes.php">Regresar</a>
                        </div>
                        <button class="btn-registrar-usuario btn-form">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>