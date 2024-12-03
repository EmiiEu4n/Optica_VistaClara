<head>
    

    <!-- Preconnect para Font Awesome -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" as="style" />
    <link rel="stylesheet" href="../css/portal_cliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


    <style>
        ul li a {
            display: flex;
            align-items: center;
        }

        ul li a i {
            margin-right: 8px;
            /* Espacio entre el ícono y el texto */
        }
    </style>

</head>
<header class="header">
    <!-- <h1>Portal del Cliente</h1> -->
    <nav class="navbar">
        <h2><i class="fas fa-user-circle"></i> Portal del cliente</h2>
        <ul>
            <li><a href="../landing_page/Landing_page.php#aqui1"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="../paginas/perfil_cliente.php"><i class="fas fa-user"></i> Mi Cuenta</a></li>
            <li><a href="../paginas/mostrar_citas_cliente.php"><i class="fas fa-calendar-alt"></i> Citas</a></li>
            <li><a href="../landing_page/Landing_page.php#aqui5"><i class="fas fa-envelope"></i> Contacto</a></li>
            <li><a href="../php/salir.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
        </ul>

    </nav>
</header>