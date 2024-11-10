<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Inicio de sesión</title>
    <style>
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
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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
            color: #333;
            margin-bottom: 20px;
        }

        .container-iniciar-sesion .avisoerror {
            color: #F27474;
            text-align: center;
        }

        .container-iniciar-sesion a {
            color:#151e2d;
            /* font-weight: bold; */
            text-decoration: none;
            font-size: 14px;
        }

        .container-iniciar-sesion input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            /* Asegura que el padding esté incluido en el tamaño total del input */
        }

        .password-container {
            position: relative;
        }

        .password-container input {
            width: 100%;
            /* Mantiene el ancho del input dentro del contenedor */
            padding-right: 40px;
            /* Añade espacio para el ícono */
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 37%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #333;
        }

        .btn-form {
            width: 100%;
            padding: 10px;
            background-color: #151e2d;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            transition: 0.2s ease-out;
            cursor: pointer;
        }

        .btn-form:hover {
            background-color: #9249d0;
            color:white;
        }

        @media (max-width: 600px) {
            .content-inicio-sesion {
                padding: 15px;
                margin: 10px;
            }

            .img-logo img {
                width: 80px;
            }
        }

        .button-container {
            text-align: center;
            margin-top: 10px;
        }

        .button-container a {
            display: inline-block;
            background-color: #8577ED;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button-container a:hover {
            background-color: #9249d0;
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
                    <br><br>
                    <!-- Contraseña -->
                    <!-- <label for="password">Contraseña</label><br> -->
                    <div class="password-container">
                        <input required name="contrasena" type="password" placeholder="Ingresa tu contraseña" id="password">
                        <span class="toggle-password" onclick="togglePasswordVisibility()">
                            <i id="eye-icon" class="fas fa-eye-slash"></i>
                        </span>
                    </div><a href="">¿Olvidaste tu contraseña?</a><br>
                    <br><br>
                    <!-- Boton -->
                    <button class="btn-form">Iniciar Sesión</button>
                    
                    <hr>
                </form>
                <div class="button-container"><a href="">Crear cuenta nueva</a></div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
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
    </script>
</body>

</html>