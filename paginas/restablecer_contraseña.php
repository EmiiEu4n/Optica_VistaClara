<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php 
        session_start();
        if (!isset($_SESSION['codigoVerificado']) && $_SESSION['codigoVerificado'] != "SI") {
            header("Location: ./pagina_verificacion.php");
            exit();
        }
    ?>

    <div class="main-content">
        <div class="contenido">
            <div class="container">
                <form action="../php/update_contrasena.php?origen=restablecer" method="POST" class="form">
                    <h2>Restablecer contraseña</h2>
                    <div class="password-container">
                        <input required name="contrasena-nueva" type="password" placeholder="Contraseña nueva" id="modal-password" oninput="validatePassword()">
                        <span class="toggle-password" onclick="togglePasswordVisibility('modal-password', 'eye-icon-modal')">
                            <i id="eye-icon-modal" class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                    <div class="password-container">
                        <input required name="confirmar-contrasena" type="password" placeholder="Confirmar contraseña nueva" id="modal-confirm-password" oninput="checkPasswordMatch()">
                    </div>
                    <ul class="validation-list" id="password-requirements">
                        <li id="length" class="invalid">Mínimo 8 caracteres</li>
                        <li id="uppercase" class="invalid">Una letra mayúscula</li>
                        <li id="lowercase" class="invalid">Una letra minúscula</li>
                        <li id="number" class="invalid">Un número</li>
                        <li id="special" class="invalid">Un carácter especial</li>
                    </ul>
                    <input type="hidden" value="<?php $rol?>" name="rol">
                    <button type="submit" id="submitButton" disabled>Actualizar Contraseña</button>
                </form><br>
            </div>
        </div>
    </div>

    <script>
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

        function validatePassword() {
            const password = document.getElementById('modal-password').value;
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /\d/.test(password),
                special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
            };
            for (const key in requirements) {
                const requirementElement = document.getElementById(key);
                requirementElement.className = requirements[key] ? 'valid' : 'invalid';
            }
            checkPasswordMatch();
        }

        function checkPasswordMatch() {
            const password = document.getElementById('modal-password').value;
            const confirmPassword = document.getElementById('modal-confirm-password').value;
            const submitButton = document.getElementById('submitButton');
            if (password === confirmPassword && document.querySelectorAll('.valid').length === 5) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
    </script>

    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 1)),
                url("https://cdn.pixabay.com/photo/2021/02/16/20/45/eye-glasses-6022344_960_720.jpg") no-repeat center center;
            background-size: cover;
        }

        .password-container {
            position: relative;
        }

        .password-container input {
            width: calc(100% - 50px); /* Ajusta el ancho para dar espacio al ícono del ojo */
            padding-right: 40px;
            padding-left: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white; /* Asegura el fondo blanco */
            color: black; /* Asegura el color del texto */
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 37%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #333;
        }

        .contenido {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Asegura que ocupe toda la altura de la pantalla */
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #53504a;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #151e2d;
        }

        .validation-list {
            list-style-type: none;
            padding: 0;
            margin: 10px 0;
        }

        .validation-list li {
            color: #151e2d;
        }

        .validation-list li.valid {
            color: #8577ED;
        }
    </style>
</body>
