<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver cita</title>
</head>

<body>

    <?php include "menu_panel.php";
    require "../php/conexion.php";

    //Notificaciones
    if (isset($_SESSION["icon"])) {
        if ($_SESSION['icon'] == 'success') {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                });
                </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        } else if ($_SESSION['icon'] == 'error') {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                });
                </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        } else if ($_SESSION['icon'] == 'warning') {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                });
                </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        } else if ($_SESSION['icon'] == 'info') {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                });
                </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        }
    }

    //get de origen
    $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
    $id = $_GET['id'];

    // instruccion
    $cita = "SELECT ci.id_cita, cl.id_cliente, cl.nombres, cl.apellidos, cl.correo, cl.telefono, cl.preescripcion, ci.fecha_cita, ci.hora, ci.estado, ci.motivo
    FROM citas ci
    INNER JOIN clientes cl ON ci.id_cliente = cl.id_cliente
    WHERE ci.id_cita = '$id'";

    // consulta
    $query = mysqli_query($conectar, $cita);

    $info = $query->fetch_array();
    ?>
    <div class="main-content">
        <div class="titulo">
            <h3>Cliente: <span style="color: grey"><?php echo $info['apellidos'] . " " . $info['nombres'] ?></span></h3>
            
        </div><br>
        <div style="width: 800px;" class="opciones-btn-ver opciones-btn">
            <div class="btn-regresar-ver-cliente btn">
                <a href="./mostrar_citas.php">Regresar</a>
            </div>
            <div class="btn">
                <a href="./editar_cliente.php?origen=<?php echo $origen ?>ver&id_cita=<?php echo $id ?>&id=<?php echo $info['id_cliente'] ?>">Editar cliente</a>
            </div>
            <div class="btn">
                <a href="./editar_cita.php?origen=<?php echo $origen ?>ver&id=<?php echo $id ?>">Reprogramar</a>
            </div>
            <div class="btn">
                <a class="cancelar-cita" href="../php/cancelar_cita.php?empleado=<?php echo $_SESSION['id']; ?>&id=<?php echo $id ?>">Cancelar</a>
            </div>
            <div class="btn">
                <a class="confirmar-cita" href="../php/confirmar_cita.php?empleado=<?php echo $_SESSION['id']; ?>&id=<?php echo $id ?>">Confirmar</a>
            </div>
        </div>
        <div class="content-info">
            <div class="info formulario">
                <!-- informacion del cliente -->
                <fieldset disabled="disable">
                    <legend>Información de la cita</legend>
                    <!-- Fecha -->
                    <label for="">Fecha:</label>
                    <input value="<?php echo $info['fecha_cita'] ?>" type="text"><br><br>
                    <!-- Hora -->
                    <label for="">Hora:</label>
                    <input value="<?php
                                    // Obtener la hora de la fila
                                    $hora = $info['hora'];
                                    if($hora !=  null){
                                        // Formatear la hora de 24h a 12h con AM/PM
                                        $hora_formateada = date("g:i A", strtotime($hora));
                                        // Mostrar la hora formateada
                                        echo $hora_formateada;
                                    }else{
                                        echo "No disponible";
                                    }
                                    ?>" type="text"><br><br>
                    <!-- Motivo -->
                    <label for="">Motivo:</label><br>
                    <textarea name="" id=""><?php echo $info['motivo'] ?></textarea><br><br>
                    <!-- Estado -->
                    <label for="">Estado:</label>
                    <input value="<?php echo $info['estado'] ?>" type="text"><br><br>
                </fieldset>
                <fieldset disabled="disable">
                    <legend>Información del cliente</legend>
                    <!-- Nombre completo -->
                    <label for="">Nombre completo</label><br>
                    <input value="<?php echo $info['nombres'] . " " . $info['apellidos'] ?>" type="text"><br><br>
                    <!-- Correo -->
                    <label for="">Correo</label><br>
                    <input value="<?php echo $info['correo'] ?>" type="text"><br><br>

                    <!-- Telefono -->
                    <label for="">Telefono</label><br>
                    <input value="<?php echo $info['telefono'] ?>" type="text"><br><br>

                    <!-- Preescripcion -->
                    <label for="">Preescripcion</label><br>
                    <textarea name="" id=""><?php echo $info['preescripcion'] ?></textarea><br><br>
                </fieldset>

            </div>

        </div>

    </div>

    <!-- Javscript Botono -->
    <script>




    </script>

</body>

</html>