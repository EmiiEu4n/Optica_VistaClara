<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Material Icons para los iconos -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body>

    <?php
    session_start();
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
        
        body {

            font-family: 'Roboto', sans-serif;


            background-image: url('https://images.pexels.com/photos/29348783/pexels-photo-29348783/free-photo-of-conjunto-de-gafas-minimalistas-sobre-fondo-blanco.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            /* Cambia esta URL por una imagen adecuada */
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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            overflow: hidden;
            text-align: center;
        }

        .profile-header {
            background-color: #a7afb6;
            padding: 20px;
            color: white;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 100%;
            border: 3px solid white;
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
            color: #333;
        }

        .profile-info p {
            margin-bottom: 10px;
            color: #555;
        }

        .profile-options {
            padding: 20px;
            display: flex;
            justify-content: space-around;
            background-color: #f9f9f9;
            flex-wrap: wrap;
        }

        .profile-options .btn {
            background-color: #53504a;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            margin: 10px;
            flex: 1 1 30%;
            /* Ajuste para que los botones se distribuyan bien en pantallas pequeñas */
            max-width: 200px;
            justify-content: center;
        }

        .profile-options .btn:hover {
            background-color: #151e2d;
        }

        .material-icons {
            font-size: 22px;
            color: white;
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
        /* CSS provisto por ti */
        body {
            background-color: #f4f4f4;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow-y: auto;
            /* Permite scroll en el cuerpo si es necesario */
        }

        .content-btn-modal {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .open-modal-btn {
            background-color: #8577ED;
            color: white;
            padding: 10px 30px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .open-modal-btn:hover {
            background-color: #9249d0;
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
            /* Activa el scroll en el modal si el contenido es grande */
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 550px;
            max-height: 90vh;
            /* Limita la altura para evitar que el modal se salga de la pantalla */
            overflow-y: auto;
            /* Activa el scroll en el modal si el contenido es grande */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
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

        label {
            margin-bottom: 5px;
            color: #333;
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

        /* fin */


        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #53504a;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #151e2d;
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
            /* Espacio para el ícono de la contraseña */
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