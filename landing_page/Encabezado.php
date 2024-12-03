            <?php
            session_start();
            $btn_dinamic;
            if (isset($_SESSION['cliente_autentificado']) && $_SESSION['cliente_autentificado'] == "SI") {
                $btn_dinamic = '<a href="../paginas/portal_cliente.php"><i class="fas fa-user-circle"></i> Portal Cliente</a>';
                


            } else {
                $btn_dinamic = '<a href="../index.php"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>';
            }
            ?>

            <head>

                <head>
                    <!-- Pre-cargar CSS de manera eficiente -->
                    <link rel="preload" href="estilos_landing.css" as="style">
                    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" as="style">

                    <!-- Enlace al archivo CSS local y externo -->
                    <link rel="stylesheet" href="estilos_landing.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                </head>

                <style>
                    .caja1 a i {
                        margin-right: 8px;
                        /* Espacio entre el icono y el texto */
                        font-size: 18px;
                        /* Tamaño del icono */
                    }
                </style>
            </head>
            <header>
                <div class="contenedor1">
                    <div class="caja tamaño">
                        <img src="../imagenes/logo2.png" alt="Logo Óptica Vista Clara">
                    </div>
                    <div class="caja1">
                        <a href="#aqui1"><i class="fas fa-home"></i> Inicio</a>
                        <a href="#aqui2"><i class="fas fa-cogs"></i> Servicios</a>
                        <a href="#aqui3"><i class="fas fa-box"></i> Productos</a>
                        <a href="#aqui4"><i class="fas fa-users"></i> Conócenos</a>
                        <a href="#aqui5"><i class="fas fa-phone-alt"></i> Contacto</a>
                        <?php echo $btn_dinamic; ?>
                    </div>

                </div>
            </header>