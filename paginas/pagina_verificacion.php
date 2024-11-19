<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    //Verifica que se haya cumplido el paso de enviar el correo
    session_start();
    if (!isset($_SESSION['correoEnviado']) || $_SESSION['correoEnviado'] !== "SI") {
        header("Location: ../index.php");
        exit();
    }

    include "../php/notificaciones.php";
    if (isset($_SESSION["icon"])) {
        notify();
    }
    $correo = isset($_SESSION['correo_electronico']) ? $_SESSION['correo_electronico'] : "";
    $verificacion = isset($_GET['origen']) ? $_GET['origen'] : "Restablecer Contraseña";
    ?>
    <title>Verificación de código</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1><?php echo $verificacion ?></h1><br>
            <p>Ingresa el código de 4 dígitos enviado a tu correo</p>
        </div>
        <form action="../php/verify_codigo.php" method="post">
            <div class="input-group">
                <label for="codigo">Código de verificación</label>
                <div class="otp-inputs">
                    <input type="text" id="codigo1" name="codigo[]" maxlength="1" required oninput="moveNext(this, 'codigo2', '')">
                    <input type="text" id="codigo2" name="codigo[]" maxlength="1" required oninput="moveNext(this, 'codigo3', 'codigo1')">
                    <input type="text" id="codigo3" name="codigo[]" maxlength="1" required oninput="moveNext(this, 'codigo4', 'codigo2')">
                    <input type="text" id="codigo4" name="codigo[]" maxlength="1" required oninput="moveNext(this, '', 'codigo3')">
                </div>
            </div> <button type="submit" class="btn">Continuar</button>
        </form>
        <div class="footer">
            <p>¿No recibiste el código? <a href="../php/verify_correo.php?correo=<?php echo $correo ?>" class="resend-link">Reenviar</a></p>
        </div>
    </div>

    <script>
        function moveNext(current, nextFieldID, prevFieldID) {
            if (current.value.length >= 1) {
                if (nextFieldID) {
                    document.getElementById(nextFieldID).focus();
                }
            } else if (current.value.length === 0) {
                if (prevFieldID) {
                    document.getElementById(prevFieldID).focus();
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../javascript/notificaciones.js" defer></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("https://cdn.pixabay.com/photo/2021/02/16/20/45/eye-glasses-6022344_960_720.jpg") no-repeat center center;
            background-size: cover;
            color: #333;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            /* animation: fadeIn 1s ease-in-out; */
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #151e2d;
        }

        .header p {
            font-size: 16px;
            color: #666;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .input-group label {
            font-size: 16px;
            color: #151e2d;
        }

        .otp-inputs {
            display: flex;
            justify-content: space-between;
        }

        .otp-inputs input {
            width: 22%;
            padding: 10px;
            font-size: 18px;
            border: 2px solid #ddd;
            border-radius: 5px;
            text-align: center;
            /* transition: all 0.3s; */
        }

        .otp-inputs input:focus {
            outline: none;
            border-color: #8577ED;
            box-shadow: 0 0 5px rgba(133, 119, 237, 0.5);
        }

        .btn {
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            background-color: #8577ED;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            /* transition: background-color 0.3s; */
        }

        .btn:hover {
            background-color: #6a5bda;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
            color: #999;
        }

        .footer .resend-link {
            color: #007bff;
            text-decoration: none;
        }

        .footer .resend-link:hover {
            text-decoration: underline;
        }

        /* Estilos responsivos */
        @media only screen and (max-width: 768px) {
            .container {
                width: 90%;
            }
        }

        @media only screen and (max-width: 480px) {
            .container {
                width: 100%;
                padding: 15px;
            }

            .header h1 {
                font-size: 20px;
            }

            .btn {
                padding: 10px;
                font-size: 14px;
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
</body>

</html>