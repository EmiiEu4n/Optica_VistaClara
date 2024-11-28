<!-- index.html -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar Cita</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        .modal-content input {
            border: 1px #ccc solid;
            border-radius: 5px;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }
        .modal-content button{
            border: 0px red solid;
            border-radius: 5px;
            background-color: black;
            color: white;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }

        #error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    // Verificar si ya está autenticado
    if(isset($_SESSION['autentificar']) && $_SESSION['autentificar'] == "SI") {
        header("Location: agendar_cita.php");
        exit();
    }
    ?>

    <!-- Botón de Agendar Cita -->
    <!-- <button id="schedule-btn">Agendar Cita</button> -->

    <!-- Modal de Inicio de Sesión -->
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <h2>Iniciar Sesión</h2>
            
            <?php
            // Mostrar mensaje de error si existe
            if(isset($_GET['errorusuario']) && $_GET['errorusuario'] == 'SI') {
                echo '<div style="color:red;">Correo o contraseña incorrectos</div>';
            }
            ?>

            <form action="../index.php" method="POST">
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
            <p>¿No tienes cuenta? <a href="registrar_cliente_2.php">Regístrate</a></p>
        </div>
    </div>

    <script>
        // Mostrar modal de inicio de sesión
        document.getElementById('schedule-btn').addEventListener('click', function() {
            document.getElementById('login-modal').style.display = 'flex';
        });

        // Cerrar modal si se hace clic fuera de él
        window.onclick = function(event) {
            const modal = document.getElementById('login-modal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>