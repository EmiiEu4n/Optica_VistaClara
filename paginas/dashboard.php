<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Font Awesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos personalizados para el dashboard */

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .dashboard-card {
            background: var(--color0);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.333% - 40px);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .dashboard-card i {
            font-size: 2em;
            color: var(--color2);
        }

        .dashboard-card .card-content {
            flex-grow: 1;
        }

        .dashboard-card .card-content h3 {
            margin: 0;
            font-size: 1.4em;
            color: var(--color2);
        }

        .dashboard-card .card-content p {
            margin: 5px 0 0;
            font-size: 1.2em;
            color: var(--color4);
        }

        @media (max-width: 768px) {
            .dashboard-card {
                flex: 1 1 calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .dashboard-card {
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>
    <?php
    include "./menu_panel.php";
    include "../php/conexion.php";
    include "../php/notificaciones.php";

    // Notificaciones
    if (isset($_SESSION["icon"])) {
        notify();
    }

    // Consultas para obtener los datos

    // Total de citas
    $result = mysqli_query($conectar, "SELECT COUNT(*) as total FROM citas");
    $total_citas = mysqli_fetch_assoc($result)['total'];

    //Citas de hoy
    $result = mysqli_query($conectar, "SELECT COUNT(*) as total FROM citas WHERE DATE(fecha_cita) = CURDATE() AND estado = 'Pendiente'");
    $citas_hoy = mysqli_fetch_assoc($result)['total'];


    // Citas pendientes
    $result = mysqli_query($conectar, "SELECT COUNT(*) as total FROM citas WHERE estado = 'Pendiente'");
    $citas_pendientes = mysqli_fetch_assoc($result)['total'];

    // Citas canceladas
    // $result = mysqli_query($conectar, "SELECT COUNT(*) as total FROM citas WHERE estado = 'Cancelada'");
    // $citas_canceladas = mysqli_fetch_assoc($result)['total'];

    // Citas confirmadas
    // $result = mysqli_query($conectar, "SELECT COUNT(*) as total FROM citas WHERE estado = 'Terminado'");
    // $citas_confirmadas = mysqli_fetch_assoc($result)['total'];

    // Trabajadores
    $result = mysqli_query($conectar, "SELECT COUNT(*) as total FROM empleados");
    $trabajadores = mysqli_fetch_assoc($result)['total'];

    // Clientes
    $result = mysqli_query($conectar, "SELECT COUNT(*) as total FROM clientes");
    $clientes = mysqli_fetch_assoc($result)['total'];

    // Productos de alta
    $result = mysqli_query($conectar, "SELECT COUNT(*) as total FROM productos");
    $productos = mysqli_fetch_assoc($result)['total'];

    ?>

    <div class="main-content">
        <div class="dashboard-container">
            <!-- Total de Citas -->
            <div class="dashboard-card">
                <i class="fas fa-calendar-check"></i>
                <div class="card-content">
                    <h3>Total de Citas</h3>
                    <p><?php echo $total_citas; ?></p>
                </div>
            </div>
            <!-- Citas del Día de Hoy -->
            <div class="dashboard-card">
                <i class="fas fa-calendar-day"></i>
                <div class="card-content">
                    <h3>Citas de Hoy</h3>
                    <p><?php echo $citas_hoy; ?></p>
                </div>
            </div>

            <!-- Citas Pendientes -->
            <div class="dashboard-card">
                <i class="fas fa-hourglass-half"></i>
                <div class="card-content">
                    <h3>Citas Pendientes</h3>
                    <p><?php echo $citas_pendientes; ?></p>
                </div>
            </div>
            <!-- Citas Canceladas -->
            <!-- <div class="dashboard-card">
                <i class="fas fa-calendar-times"></i>
                <div class="card-content">
                    <h3>Citas Canceladas</h3>
                    <p><?php echo $citas_canceladas; ?></p>
                </div>
            </div> -->
            <!-- Citas Confirmadas -->
            <!-- <div class="dashboard-card">
                <i class="fas fa-check-circle"></i>
                <div class="card-content">
                    <h3>Citas Confirmadas</h3>
                    <p><?php echo $citas_confirmadas; ?></p>
                </div>
            </div> -->
            <!-- Trabajadores -->
            <div class="dashboard-card">
                <i class="fas fa-users"></i>
                <div class="card-content">
                    <h3>Trabajadores</h3>
                    <p><?php echo $trabajadores; ?></p>
                </div>
            </div>
            <!-- Clientes -->
            <div class="dashboard-card">
                <i class="fas fa-user-friends"></i>
                <div class="card-content">
                    <h3>Clientes</h3>
                    <p><?php echo $clientes; ?></p>
                </div>
            </div>
            <!-- Productos de Alta -->
            <div class="dashboard-card">
                <i class="fas fa-box"></i>
                <div class="card-content">
                    <h3>Productos de Alta</h3>
                    <p><?php echo $productos; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>