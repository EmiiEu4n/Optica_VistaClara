<?php require "../php/seguridad_cliente.php"; ?>
<!DOCTYPE html>
<html lang="en">

<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <!-- Preconexión a los servidores necesarios -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>

    <!-- Preload de la fuente Roboto -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" as="style">

    <!-- Carga asíncrona de Material Icons y Font Awesome -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" media="print" onload="this.media='all'">

    <!-- Carga de la fuente Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">


</head>

<body>

    <?php
    include "../php/notificaciones.php";
    include "../php/conexion.php";

    //Notificaciones
    if (isset($_SESSION["icon"])) {
        notify();
    }
    $id = $_SESSION['id_cliente'];
    // instruccion
    $producto = "SELECT *, concat(nombres,' ',apellidos) AS nombre_completo FROM clientes WHERE id_cliente = '$id'";
    // consulta
    $query = mysqli_query($conectar, $producto);
    $info = $query->fetch_array();
    ?>

    <div class="container">
        <div class="profile-card">
            <div class="profile-header">
                <!-- <img src="../productos/2024-10-24-06-03-32-chocolate_donut.png" alt="Foto de Perfil" class="profile-image"> -->
                <h2><?php echo isset($info['nombre_completo']) ?  $info['nombre_completo'] : 'Anonimo' ?></h2>
                <p><?php echo isset($info['correo']) ?  $info['correo'] : 'n/d' ?></p>
            </div>

            <div class="profile-info">
                <h3>Información del Usuario</h3>
                <p><strong>Correo Electrónico:</strong> <?php echo isset($info['correo']) ?  $info['correo'] : 'n/d' ?></p>
                <p><strong>Teléfono:</strong> <?php echo isset($info['telefono']) ?  $info['telefono'] : 'n/d' ?></p>
                <p><strong>Dirección:</strong> <?php echo isset($info['direccion']) ?  $info['direccion'] : 'n/d' ?></p>
                <p><strong>Prescripción medica:</strong> <?php echo isset($info['preescripcion']) ?  $info['preescripcion'] : 'n/d' ?></p>
            </div>

            <div class="profile-options">
                <a href="./editar_perfil.php?origen=perfil&id=<?php echo $id; ?>" class="btn"><span class="material-icons">edit</span> Editar Perfil</a>
                <a href="./actualizar_contrasena_cliente.php" class="btn"><span class="material-icons">password</span> Actualizar Contraseña</a>
                <a href="../php/salir.php" class="btn"><span class="material-icons">logout</span> Cerrar Sesión</a>
                <!-- <a href="../php/verify_correo.php?correo=<?php echo $info['correo']; ?>" class="btn"><span class="material-icons">lock_reset</span> Restablecer contraseña</a> -->
                <a href="./portal_cliente.php" class="btn"><span class="material-icons">arrow_circle_left</span> Regresar al portal</a>
            </div>
        </div>
    </div>
    <!-- Termina la informacion -->

    <!-- El modal -->
    <!-- <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Actualizar Contraseña</h2>
            <form id="registerForm" method="post" action="../php/verificar_contrasena.php?origen=empleados"><br>

                <label for="">Contraseña Actual: <span>*</span></label>
                <div class="password-container">
                    <input required name="contrasena" type="password" placeholder="Ingresa tu contraseña actual" id="modal-password">
                    <span class="toggle-password" onclick="togglePasswordVisibility('modal-password', 'eye-icon-modal')">
                        <i id="eye-icon-modal" class="fas fa-eye-slash"></i>
                    </span>
                </div>

                <button class="" type="submit" id="submitButton">Confirmar</button>
            </form>
        </div>
    </div> -->
    <script>
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
        function openModal() {
            document.getElementById('myModal').style.display = 'block';
        }

        // Cierra el modal
        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script>
    <style>
        :root {
            --primary-color: #8577ED;
            /* Color principal para los botones y fondo */
            --hover-color: #9249d0;
            /* Color al pasar el cursor por los botones */
            --header-bg-color: #151e2d;
            /* Fondo del encabezado del perfil */
            --text-color-light: white;
            /* Color blanco para el texto */
            --text-color-dark: #333;
            /* Color oscuro para los textos principales */
            --text-color-muted: #555;
            /* Color gris para los textos secundarios */
            --border-color: #ccc;
            /* Color del borde de los inputs */
            --input-bg-color: #fff;
            /* Fondo blanco para los inputs */
            --btn-radius: 5px;
            /* Radio de los bordes de los botones */
        }

        body {
            font-family: 'Roboto', sans-serif;
            background:
                linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.9)),
                url('../imagenes/img2.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-card {
            background-color: var(--input-bg-color);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            overflow: hidden;
            text-align: center;
        }

        .profile-header {
            background-color: var(--header-bg-color);
            padding: 20px;
            color: var(--text-color-light);
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 100%;
            border: 3px solid var(--input-bg-color);
        }

        .profile-header h2 {
            margin: 10px 0 5px;
        }

        .profile-header p {
            font-size: 14px;
        }

        .profile-info {
            padding: 20px;
            text-align: left;
        }

        .profile-info h3 {
            margin-bottom: 15px;
            color: var(--text-color-dark);
        }

        .profile-info p {
            margin-bottom: 10px;
            color: var(--text-color-muted);
        }

        .profile-options {
            padding: 20px;
            display: flex;
            justify-content: space-around;
            background-color: #f9f9f9;
            flex-wrap: wrap;
        }

        .profile-options .btn {
            background-color: var(--primary-color);
            color: var(--text-color-light);
            text-decoration: none;
            padding: 10px 15px;
            border-radius: var(--btn-radius);
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            margin: 10px;
            flex: 1 1 30%;
            max-width: 200px;
            justify-content: center;
        }

        .profile-options .btn:hover {
            background-color: var(--hover-color);
        }

        .material-icons {
            font-size: 22px;
            color: var(--text-color-light);
        }

        @media (max-width: 768px) {
            .profile-card {
                width: 90%;
            }

            .profile-info {
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .profile-options {
                flex-direction: column;
            }

            .profile-options .btn {
                max-width: 100%;
            }
        }
    </style>

    <!-- Modal -->
    <style>
        :root {
            /* Colores Globales */
            --color-primary: #8577ED;
            --color-primary-hover: #9249d0;
            --color-secondary: #53504a;
            --color-secondary-hover: #9249d0;
            --color-background: #f4f4f4;
            --color-white: white;
            --color-black: #333;
            --color-gray-light: #ccc;
            --color-gray-dark: #8577ED;
            --color-shadow: rgba(0, 0, 0, 0.3);
        }

        body {
            background-color: var(--color-background);
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow-y: auto;
        }

        .content-btn-modal {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .open-modal-btn {
            background-color: var(--color-primary);
            color: var(--color-white);
            padding: 10px 30px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .open-modal-btn:hover {
            background-color: var(--color-primary-hover);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }

        .modal-content {
            background-color: var(--color-white);
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 550px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 5px 15px var(--color-shadow);
            animation: slide-down 0.3s ease-out;
        }

        @keyframes slide-down {
            from {
                transform: translateY(-100px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close-btn {
            float: right;
            font-size: 24px;
            font-weight: bold;
            color: var(--color-gray-dark);
            cursor: pointer;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: var(--color-black);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: var(--color-black);
        }

        .password-container {
            position: relative;
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
            color: var(--color-black);
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid var(--color-gray-light);
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: var(--color-gray-dark);
            color: var(--color-white);
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--color-secondary-hover);
        }

        /* Estilos responsivos */
        @media (max-width: 600px) {
            .modal-content {
                width: 90%;
            }

            input,
            button {
                font-size: 14px;
            }
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
            cursor: pointer;
            font-size: 18px;
            color: #888;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../javascript/notificaciones.js" defer></script>
</body>

</html>