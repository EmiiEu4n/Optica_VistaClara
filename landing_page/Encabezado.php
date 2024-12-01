            <?php 
            session_start();
            $btn_dinamic;
            if( isset($_SESSION['cliente_autentificado']) && $_SESSION['cliente_autentificado'] == "SI"){
                $btn_dinamic = '<a href="../paginas/portal_cliente.php">Portal Cliente</a>';
            }else{
                $btn_dinamic = '<a href="../index.php">Iniciar Sesión</a>';
            }
            ?>
<head>
    <link rel="stylesheet" href="estilos_landing.css">
</head>
<header>
    <div class="contenedor1">
        <div class="caja tamaño">
            <img src="../imagenes/logo2.png" alt="Logo Óptica Vista Clara">
        </div>
        <div class="caja1">
            <a href="#aqui1">Inicio</a>
            <a href="#aqui2">Servicios</a>
            <a href="#aqui3">Productos</a>
            <a href="#aqui4">Conócenos</a>
            <a href="#aqui5">Contacto</a>
            <?php echo $btn_dinamic;?>
        </div>
    </div>
</header>