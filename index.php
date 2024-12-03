<?php
session_start();
if (isset($_SESSION['autentificado']) == "SI") {
    header("Location:./paginas/dashboard.php");
} else if (isset($_SESSION['cliente_autentificado']) == "SI") {
    header("Location:./paginas/portal_cliente.php");
}
//Notificaciones
include "./php/notificaciones.php";
if (isset($_SESSION["icon"])) {
    notify();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Inicio de sesión</title>
    <style>
        :root {
    --primary-bg-color: #151e2d;
    --primary-text-color: #333;
    --secondary-bg-color: #8577ED;
    --secondary-hover-bg-color: #9249d0;
    --input-border-color: #ccc;
    --input-bg-color: #fff;
    --error-color: #F27474;
    --modal-bg-color: rgba(0, 0, 0, 0.5);
    --success-color: green;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 1)),
        url("https://cdn.pixabay.com/photo/2021/02/16/20/45/eye-glasses-6022344_960_720.jpg") no-repeat center center;
    background-size: cover;
    font-family: 'Arial', sans-serif;
}

.content-inicio-sesion {
    background: var(--input-bg-color);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
    max-width: 400px;
    width: 100%;
}

.img-logo {
    display: flex;
    justify-content: center;
}

.img-logo img {
    width: 100px;
    border-radius: 50%;
}

.container-iniciar-sesion h3 {
    text-align: center;
    color: var(--primary-text-color);
    margin-bottom: 20px;
}

.container-iniciar-sesion .avisoerror {
    color: var(--error-color);
    text-align: center;
}

.container-iniciar-sesion a {
    color: var(--primary-bg-color);
    text-decoration: none;
    font-size: 14px;
}

.container-iniciar-sesion a:hover {
    color: var(--secondary-hover-bg-color);
}

.container-iniciar-sesion input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid var(--input-border-color);
    border-radius: 5px;
    box-sizing: border-box;
}

.password-container {
    position: relative;
            display: flex;
            align-items: center;
            width: 100%;
}

.password-container input {
    width: 100%;
    padding-right: 40px;
}

.toggle-password {
    position: absolute;
    right: 10px;
    top: 37%;
    transform: translateY(-50%);
    cursor: pointer;
    color: var(--primary-text-color);
}

.btn-form {
    width: 100%;
    padding: 10px;
    background-color: var(--primary-bg-color);
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    transition: 0.2s ease-out;
    cursor: pointer;
    margin-bottom: 20px;
}

.btn-form:hover {
    background-color: var(--secondary-hover-bg-color);
}

.content-btn-modal {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.open-modal-btn {
    background-color: var(--secondary-bg-color);
    color: white;
    padding: 10px 30px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
}

.open-modal-btn:hover {
    background-color: var(--secondary-hover-bg-color);
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: var(--modal-bg-color);
    overflow-y: auto;
}

.modal-content {
    background-color: var(--input-bg-color);
    margin: 5% auto;
    padding: 20px;
    border-radius: 10px;
    width: 80%;
    max-width: 550px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    animation: slide-down 0.3s ease-out;
}

.close-btn {
    float: right;
    font-size: 24px;
    font-weight: bold;
    color: #aaa;
    cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
}

form {
    display: flex;
    flex-direction: column;
}

label, p {
    margin-bottom: 5px;
    color: var(--primary-text-color);
}

input {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid var(--input-border-color);
    border-radius: 5px;
    font-size: 16px;
}

button {
    background-color: var(--primary-bg-color);
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: var(--secondary-hover-bg-color);
}

@media (max-width: 600px) {
    .modal-content {
        width: 90%;
    }

    input,
    button {
        font-size: 14px;
    }
}

.validation-list {
    list-style: none;
    padding: 0;
    color: var(--error-color);
}

.validation-list li {
    display: flex;
    align-items: center;
}

.validation-list li .status {
    margin-left: 10px;
}

.valid {
    color: var(--success-color);
}

.invalid {
    color: var(--error-color);
}

    </style>

</head>

<body>

    <div class="content-inicio-sesion">
        <div class="box-sesion">
            <div class="img-logo">
                <img src="./imagenes/logo.png" alt="Logo">
            </div><br>

            <div class="container-iniciar-sesion ancho">
                <!-- Titulo -->
                <!-- <h3>Iniciar Sesión</h3> -->
                <!-- Mensaje de error -->
                <?php
                $errorusuario = isset($_GET["errorusuario"]);
                if ($errorusuario == "SI") {
                    echo '<p class="avisoerror">Correo electrónico o contraseña invalida</p>';
                }
                ?>
                <form action="./php/autentificar.php" method="post">
                    <!-- Usuario -->
                    <!-- <label for="username">Usuario</label><br> -->
                    <input required name="username" type="text" placeholder="Correo electrónico o usuario">
                    <br>
                    <!-- Contraseña -->
                    <!-- <label for="password">Contraseña</label><br> -->
                    <div class="password-container">
                        <!-- Campo de contraseña con el ícono de alternar -->
                        <input required name="contrasena" type="password" placeholder="Ingresa tu contraseña" id="login-password">
                        <span class="toggle-password" onclick="togglePasswordVisibility('login-password', 'eye-icon-login')">
                            <i id="eye-icon-login" class="fas fa-eye-slash"></i>
                        </span>
                    </div>

                    <a href="#" onclick="openModal('ModalContrasena')">¿Olvidaste tu contraseña?</a><br>
                    <br>
                    <!-- Boton -->
                    <button class="btn-form">Iniciar Sesión</button>
                </form>
                <hr>
                <!-- Botón para abrir el modal -->
                <div class="content-btn-modal">
                    <button class="open-modal-btn" onclick="openModal('myModal')">Registrarse</button>
                </div>
                <!-- <div class="button-container"><a id="myBtn" href="">Crear cuenta nueva</a></div> -->
            </div>
        </div>
    </div>

    <!-- El modal registrarse -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('myModal')">&times;</span>
            <h2>Registrar nueva cuenta</h2>
            <form id="registerForm" method="post" action="./php/create_cliente.php?origen=index">
                <label for="email">Correo Electrónico: <span>*</span></label>
                <input class="validar-espacios" type="email" id="email" name="correo" placeholder="Correo electrónico" required>

                <label for="">Teléfono: <span>*</span></label>
                <input class="validar-espacios" pattern="[0-9]{10}" maxlength="10" type="texto" name="telefono" placeholder="Número celular" required>

                <label for="">Nombre(s): <span>*</span></label>
                <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,254}" class="validar-espacios" name="nombres" type="text" placeholder="Escribe su nombre Ej. José Miguel" required>

                <label for="">Apellidos: <span>*</span></label>
                <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,254}" class="validar-espacios" required name="apellidos" type="text" placeholder="Escribe los apellidos Ej.Pacheco González">

                <label for="">Domicilio: <span>*</span></label>
                <input class="validar-espacios" pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s\.\-\#\/\°]+$" required name="direccion" type="text" placeholder="Ingresa la direccion del domicilio" minlength="5" maxlength="150">


                <!-- Campo de contraseña -->
                <label for="">Contraseña: <span>*</span></label>
                <div class="password-container">
                    <input required name="contrasena" type="password" placeholder="Ingresa tu contraseña" id="modal-password" oninput="validatePassword()">
                    <span class="toggle-password" onclick="togglePasswordVisibility('modal-password', 'eye-icon-modal')">
                        <i id="eye-icon-modal" class="fas fa-eye-slash"></i>
                    </span>
                </div>

                <label for="">Confirmar contraseña: <span>*</span></label>
                <!-- Campo de confirmar contraseña -->
                <div class="password-container">
                    <input required name="confirmar-contrasena" type="password" placeholder="Confirmar contraseña" id="modal-confirm-password" oninput="checkPasswordMatch()">
                    <span class="toggle-password" onclick="togglePasswordVisibility('modal-confirm-password', 'eye-icon-modal-confirm')">
                        <i id="eye-icon-modal-confirm" class="fas fa-eye-slash"></i>
                    </span>
                </div>

                <ul class="validation-list" id="password-requirements">
                    <li id="length" class="invalid">Mínimo 8 caracteres</li>
                    <li id="uppercase" class="invalid">Una letra mayúscula</li>
                    <li id="lowercase" class="invalid">Una letra minúscula</li>
                    <li id="number" class="invalid">Un número</li>
                    <li id="special" class="invalid">Un carácter especial</li>
                </ul>

                <button type="submit" disabled id="submitButton">Registrar</button>
            </form>
        </div>
    </div>



    
    <!-- El modal recuperar contraseña -->
    <div id="ModalContrasena" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('ModalContrasena')">&times;</span>
            <h2>Restaurar contraseña</h2>
            <p>Para poder restaurar la contraseña debes indicar el correo electrónico asociado a tu cuenta de usuario.</p>
            <form id="registerForm" action="./php/verify_correo.php"><br>
                <!-- Campo de contraseña -->
                <label for="">Correo electrónico<span>*</span></label>
                <div class="password-container">
                    <input required name="correo" type="email" placeholder="Introduce tu correo electrónico">
                </div>

                <button type="submit" id="submitButton">Enviar</button>
            </form>
        </div>
    </div>

    <script>
        //Validar espacios
        // document.addEventListener('DOMContentLoaded', () => {
        //     // Selecciona inputs y textareas con la clase 'validar-espacios'
        //     const elementos = document.querySelectorAll('input.validar-espacios, textarea.validar-espacios');

        //     elementos.forEach(elemento => {
        //         elemento.addEventListener('input', (e) => {
        //             // Solo limpia múltiples espacios convirtiéndolos en uno solo
        //             e.target.value = e.target.value.replace(/\s+/g, ' ');

        //             // Si el valor comienza con espacio, lo elimina
        //             if (e.target.value.startsWith(' ')) {
        //                 e.target.value = e.target.value.trimStart();
        //             }
        //         });
        //     });

        //     const form = document.getElementById('miFormulario');

        //     if (form) {
        //         form.addEventListener('submit', (e) => {
        //             elementos.forEach(elemento => {
        //                 const valor = elemento.value.trim();
        //                 if (!valor || valor.length === 0) {
        //                     e.preventDefault();
        //                     alert(`Por favor complete el campo ${elemento.placeholder || elemento.name}`);
        //                 }
        //             });
        //         });
        //     }
        // });

        //Esconder la contraseña
        function togglePasswordVisibility(passwordId, eyeIconId) {
            const passwordField = document.getElementById(passwordId);
            const eyeIcon = document.getElementById(eyeIconId);
            const passwordFieldType = passwordField.getAttribute('type');
            if (passwordFieldType === 'password') {
                passwordField.setAttribute('type', 'text');
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordField.setAttribute('type', 'password');
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        }



        //Modal validar contraseña
        // Abre el modal
        function openModal(modal) {
            document.getElementById(modal).style.display = 'block';
        }

        // Cierra el modal
        function closeModal(modal) {
            document.getElementById(modal).style.display = 'none';
        }

        // Valida la contraseña principal y verifica los requisitos
        function validatePassword() {
            const password = document.getElementById('modal-password').value; // Cambié el ID aquí
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /\d/.test(password),
                special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
            };

            // Actualiza la clase de los elementos de la lista de requisitos
            for (const key in requirements) {
                const requirementElement = document.getElementById(key);
                requirementElement.className = requirements[key] ? 'valid' : 'invalid';
            }

            // Verifica si la contraseña y la confirmación coinciden
            checkPasswordMatch();
        }

        // Verifica si la contraseña y la confirmación coinciden
        function checkPasswordMatch() {
            const password = document.getElementById('modal-password').value; // Cambié el ID aquí
            const confirmPassword = document.getElementById('modal-confirm-password').value; // Cambié el ID aquí
            const submitButton = document.getElementById('submitButton');

            // Habilita o deshabilita el botón de submit según la comparación de contraseñas
            if (password === confirmPassword && document.querySelectorAll('.valid').length === 5) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="./javascript/sweetalert2.js"></script> -->
    <script src="./javascript/notificaciones.js" defer></script>
    <script src="./javascript/validacion.js" defer></script>
</body>

</html>