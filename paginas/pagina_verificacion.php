<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    //Verifica que se haya cumplido el paso de enviar el correo
    session_start();
    // Verifica si existe la variable de sesión 'correoEnviado' y si tiene el valor "SI"
    if (!isset($_SESSION['correoEnviado']) || $_SESSION['correoEnviado'] !== "SI") {
        // Si no está definida o no tiene el valor correcto, redirige a la página anterior
        header("Location: ../index.php");
        exit();
    }

    //Correo el codigo normal con la obtencion de los datos
    include "../php/notificaciones.php";
    //Notificaciones
    if (isset($_SESSION["icon"])) {
        notify();
    }
    $verificacion = isset($_GET['origen']) ? $_GET['origen'] : "Restablecer Contraseña";
    // $correo = isset($_SESSION['correo_electronico']) ? $_SESSION['correo_electronico'] : "";
    ?>
    <title>Verificación de codigo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
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

        .input-group input {
            padding: 10px;
            font-size: 18px;
            border: 2px solid #ddd;
            border-radius: 5px;
            text-align: center;
            transition: all 0.3s;
        }

        .input-group input:focus {
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
            transition: background-color 0.3s;
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

        /* Responsive Styles */
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
    </style>
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
                <input type="text" name="codigo" maxlength="4" placeholder="0000" required>
                <!-- <input type="hidden" name="correo" value="<?php echo $correo ?>"> -->
            </div>
            <button type="submit" class="btn">Continuar</button>
        </form>

        <div class="footer">
            <p>¿No recibiste el código? <a href="../php/verificar_correo.php?correo=<?php echo $correo ?>" style="color: #8577ED; text-decoration: none;">Reenviar</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../javascript/notificaciones.js" defer></script>
</body>

</html>