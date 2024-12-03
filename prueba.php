<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Óptica</title>

    <!-- Enlace a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .dashboard-container {
            padding: 50px;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            background-color: white;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background-color: rgba(255, 255, 255, 0.05);
            transform: rotate(45deg);
            transition: 0.5s;
            z-index: 1;
        }

        .card:hover::before {
            top: -40%;
            left: -40%;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .card h5 {
            font-size: 22px;
            font-weight: 700;
            z-index: 2;
            position: relative;
        }

        .card p {
            font-size: 32px;
            margin-bottom: 0;
            font-weight: 600;
            z-index: 2;
            position: relative;
        }

        .icon {
            font-size: 45px;
            margin-bottom: 15px;
            z-index: 2;
            position: relative;
        }

        .icon i {
            transition: color 0.3s ease;
        }

        .card:hover .icon i {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Colors for each card */
        .bg-citas {
            background-color: #6A5AE0;
            color: #fff;
        }

        .bg-clientes {
            background-color: #58d5c9;
            color: #fff;
        }

        .bg-trabajadores {
            background-color: #fa5252;
            color: #fff;
        }

        .bg-productos {
            background-color: #ff9f43;
            color: #fff;
        }

        /* Card sizes and responsive */
        @media (max-width: 992px) {
            .card {
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>

    <div class="container-fluid dashboard-container">
        <div class="row">

            <!-- Número de citas -->
            <div class="col-md-3">
                <div class="card bg-citas text-center p-4">
                    <div class="icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h5>Citas Totales</h5>
                    <p id="total-citas">120</p>
                </div>
            </div>

            <!-- Número de clientes -->
            <div class="col-md-3">
                <div class="card bg-clientes text-center p-4">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5>Clientes</h5>
                    <p id="total-clientes">50</p>
                </div>
            </div>

            <!-- Número de trabajadores -->
            <div class="col-md-3">
                <div class="card bg-trabajadores text-center p-4">
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h5>Trabajadores</h5>
                    <p id="total-trabajadores">10</p>
                </div>
            </div>

            <!-- Número de productos -->
            <div class="col-md-3">
                <div class="card bg-productos text-center p-4">
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <h5>Productos de Alta</h5>
                    <p id="total-productos">35</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
