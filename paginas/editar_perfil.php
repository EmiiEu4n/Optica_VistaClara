<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Información del Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    require "../php/conexion.php";
    include "../php/notificaciones.php";
    $id = $_GET['id'];
    //get de origen
    // $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
    // $id_cita = isset($_GET['id_cita']) ? $_GET['id_cita'] : "";
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
    <div class="container">
        <h2>Editar Información del Cliente</h2>
        <form action="../php/update_cliente.php?origen=clientes" method="POST" class="form" novalidate>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input class="validar-espacios" value="<?php echo $info['nombres'] ?>" type="text" id="nombre" name="nombres" placeholder="Ingresa el nombre" required pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,254}" title="Solo letras y espacios permitidos">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input class="validar-espacios" value="<?php echo $info['apellidos'] ?>" type="text" id="apellido" name="apellidos" placeholder="Ingresa el apellido" required pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,254}" title="Solo letras y espacios permitidos">
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input class="validar-espacios" value="<?php echo $info['correo'] ?>" type="email" id="correo" name="correo" placeholder="Ingresa el correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input class="validar-espacios" value="<?php echo $info['telefono'] ?>" type="tel" id="telefono" name="telefono" placeholder="Ingresa el número telefónico" required pattern="[0-9]{10}" maxlength="10" title="Ingresa un número de teléfono válido de 10 dígitos Ej.9999123456">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input class="validar-espacios" value="<?php echo $info['direccion'] ?>" type="text" id="direccion" name="direccion" placeholder="Ingresa la dirección" required>
            </div>
            <div class="form-group">
                <label for="prescripcion">Prescripción medica:</label>
                <textarea class="validar-espacios" style="font-family:Arial, Helvetica, sans-serif;" id="prescripcion" name="prescripcion" rows="4" placeholder="Escribe la prescripción médica" required><?php echo $info['preescripcion'] ?></textarea>
            </div>

            <!-- Enviar ID -->
            <input type="hidden" name="id" value="<?php echo $info['id_cliente'] ?>">

            <!-- Correo antiguo -->
            <input type="hidden" value="<?php echo $antiguoCorreo ?>" name="a_correo">
            <input type="hidden" value="<?php echo $antiguoVerificado ?>" name="a_verificado">
            <button type="submit" id="guardarCambios" disabled>Guardar Cambios</button>
            
        </form><br>
        <button type="submit" onclick="window.location.href='./perfil_cliente.php';">Regresar al perfil</button>

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
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("https://cdn.pixabay.com/photo/2021/02/16/20/45/eye-glasses-6022344_960_720.jpg") no-repeat center center;
            background-size: cover;
            color: #fff;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 25px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            animation: fadeIn 1s ease-in-out;
            margin: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.2rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #f9f9f9;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;   
            resize: none;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #999;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            background-color: #eef7ff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.2s;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }

        button:active {
            background-color: #004494;
            transform: scale(1);
        }

        /* Estilos responsivos */
        @media (max-width: 768px) {
            .container {
                padding: 20px 25px;
            }

            .form-group input,
            .form-group textarea {
                font-size: 0.9rem;
            }

            button {
                padding: 12px;
                font-size: 0.9rem;
            }

            h2 {
                font-size: 1.9rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px 20px;
            }

            .form-group input,
            .form-group textarea {
                font-size: 0.85rem;
            }

            button {
                padding: 10px;
                font-size: 0.85rem;
            }

            h2 {
                font-size: 1.7rem;
            }
        }

        /* Animación de fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../javascript/notificaciones.js" defer></script>
    <script src="../javascript/validacion.js" defer></script>
</body>

</html>