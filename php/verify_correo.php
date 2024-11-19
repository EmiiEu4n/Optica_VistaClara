<?php
require "./conexion.php";
require "./send_mail.php";

$correo = addslashes($_GET['correo']); // Sanitiza la entrada
$codigo = mt_rand(1000, 9999);

// Consulta para buscar en la tabla empleados
$query_empleado = "SELECT * FROM empleados WHERE correo = ?  LIMIT 1";
$consulta_empleado = $conectar->prepare($query_empleado);
$consulta_empleado->bind_param("s", $correo); //intercambiar los ? por los datos
$consulta_empleado->execute(); //realizar la consulta
$resultado_empleado = $consulta_empleado->get_result();

// $info_empleado = $resultado_empleado->fetch_array();
// echo $info_empleado['correo']."<br>";
// echo $info_empleado['usuario']."<br>";
// echo $info_empleado['contrasena']."<br>";
// exit();

if ($resultado_empleado->num_rows > 0) {
    // El usuario es un empleado
    $info_empleado = $resultado_empleado->fetch_assoc();
    $id = $info_empleado['id_empleado'];
    //insertar codigo a la base de datos
    $query = mysqli_query($conectar, "UPDATE empleados SET codigo_empleado = '$codigo' WHERE correo = '$correo'");
    //Enviar correo
    codigo_verificacion($correo, $codigo, "Restablecer contraseña");
    //Preparar las variables
    session_start();
    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Código enviado con éxito!";
    $_SESSION['sms'] = "Hemos enviado un correo electrónico con el código de verificación. Por favor, revisa tu bandeja de entrada.";
    $_SESSION['correoEnviado'] = "SI";
    $_SESSION['correo_electronico'] = $correo;
    $_SESSION['tabla'] = "empleados";

    //Redireccion
    // Construir la URL de redirección correctamente
    $url = "../paginas/pagina_verificacion.php?verificacion=Restablecer contraseña";
    header("Location: " . $url);
} else {
    // Si no es empleado, busca en la tabla de clientes
    $query_cliente = "SELECT * FROM clientes WHERE correo = ? LIMIT 1";
    $consulta_cliente = $conectar->prepare($query_cliente);
    $consulta_cliente->bind_param("s", $correo);
    $consulta_cliente->execute();
    $resultado_cliente = $consulta_cliente->get_result();

    if ($resultado_cliente->num_rows > 0) {
        // El usuario es un cliente
        $info_cliente = $resultado_cliente->fetch_assoc();
        //insertar codigo a la base de datos
        $query = mysqli_query($conectar, "UPDATE clientes SET codigo_cliente = '$codigo' WHERE correo = '$correo'");
        //Enviar correo
        codigo_verificacion($correo, $codigo, "Restablecer contraseña");
        //Preparar variables
        session_start();
        $_SESSION['icon'] = "success";
        $_SESSION['titulo'] = "¡Código enviado con éxito!";
        $_SESSION['sms'] = "Hemos enviado un correo electrónico con el código de verificación. Por favor, revisa tu bandeja de entrada.";
        $_SESSION['correoEnviado'] = "SI";
        $_SESSION['correo_electronico'] = $correo;
        $_SESSION['tabla'] = "clientes";


        // Construir la URL de redirección correctamente
        $url = "../paginas/pagina_verificacion.php?verificacion=Restablecer contraseña&correo=" . $correo;
        header("Location: " . $url);
        exit();
    } else {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡Correo no encontrado!";
        $_SESSION['sms'] = "El correo que ingresaste no está registrado en nuestro sistema. Por favor, verifica el correo e inténtalo nuevamente.";
        $_SESSION['correoEnviado'] = "SI";
        // Si no se encuentra en ninguna de las dos tablas
        header("Location: ../index.php");
    }
}
mysqli_free_result($resultado_cliente);
mysqli_free_result($resultado_empleado);
mysqli_close($conectar);
exit();
