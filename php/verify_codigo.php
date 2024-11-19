<?php
require "./conexion.php";
//Recibir datos
session_start();
$correo = addslashes($_SESSION['correo_electronico']);

// Recibirás un array en $_POST['codigo']
$codigoArray = $_POST['codigo'];

// Convertir el array en una sola cadena
$codigo = implode('', $codigoArray);

// // Ahora $codigo contiene el código completo ingresado
// echo "El código ingresado es: " . $codigo;
// exit();
// Consulta para buscar en la tabla empleados
$query_empleado = "SELECT * FROM empleados WHERE (correo = ? AND codigo_empleado = ?) LIMIT 1";
$consulta_empleado = $conectar->prepare($query_empleado);
$consulta_empleado->bind_param("si", $correo, $codigo); //intercambiar los ? por los datos
$consulta_empleado->execute(); //realizar la consultax|
$resultado_empleado = $consulta_empleado->get_result();

if ($resultado_empleado->num_rows > 0) {
    // echo "Existe el codigo en empleado";

    //Preparar variables de seguridad
    $_SESSION['codigoVerificado'] = "SI";
    //Desactivar la anterior variable
    // unset($_SESSION['correoEnviado']);

    //Redireccion
    $url = "../paginas/restablecer_contraseña.php";
    header("Location: " . $url);
    exit();
} else {
    // Si no es empleado, busca en la tabla de clientes
    $query_cliente = "SELECT * FROM clientes WHERE (correo = ? AND codigo_cliente = ?) LIMIT 1";
    $consulta_cliente = $conectar->prepare($query_cliente);
    $consulta_cliente->bind_param("si", $correo, $codigo);
    $consulta_cliente->execute();
    $resultado_cliente = $consulta_cliente->get_result();

    if ($resultado_cliente->num_rows > 0) {
        // echo "Existe el codigo en clientes";

        //Preparar variables de seguridad 
        $_SESSION['codigoVerificado'] = "SI";
        //Desactivar la anterior variable
        // unset($_SESSION['correoEnviado']);
        $url = "../paginas/restablecer_contraseña.php";
        header("Location: " . $url);
        exit();
    } else {
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡Código no válido!";
        $_SESSION['sms'] = "El código que ingresaste es incorrecto. Por favor, verifica e inténtalo de nuevo";
        // Si no se encuentra en ninguna de las dos tablas
        echo '<script> window.history.go(-1); </script>';
    }
}
mysqli_free_result($resultado_cliente);
mysqli_free_result($resultado_empleado);
mysqli_close($conectar);
exit();
