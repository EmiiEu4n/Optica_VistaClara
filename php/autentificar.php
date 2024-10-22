<?php
require "./conexion.php";

$username = addslashes($_POST['username']); // Sanitiza la entrada
$contrasena = addslashes($_POST['contrasena']); // Sanitiza la entrada

// Consulta para buscar en la tabla empleados
$query_empleado = "SELECT * FROM empleados WHERE (correo = ? OR usuario = ?) LIMIT 1";
$consulta_empleado = $conectar->prepare($query_empleado);
$consulta_empleado->bind_param("ss", $username, $username); //intercambiar los ? por los datos
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
    if (password_verify($contrasena, $info_empleado['contrasena'])) {
        // iniciar sesion
         session_start();
        // tiempo de la cookie
        $_SESSION['tiempo_expiracion'] = 60*10;

        //Crear la cookie de sesion
        setcookie("sesion_iniciada", time() + $_SESSION['tiempo_expiracion'], time() + $_SESSION['tiempo_expiracion'], '/');

        //informacion del usuario
        $_SESSION['id'] = $info_empleado['id_empleado'];
        $_SESSION['username'] = $info_empleado['usuario'];        
        $_SESSION['rol'] = $info_empleado['rol'];               
        $_SESSION['autentificado'] = 'SI';               

        //Redirigir a la pagina
        header("Location: ../paginas/dashboard.php");
    } else {
        header("Location: ../index.php?errorusuario=SI");
    }
} else {
    // Si no es empleado, busca en la tabla de clientes
    $query_cliente = "SELECT * FROM clientes WHERE correo = ? LIMIT 1";
    $consulta_cliente = $conectar->prepare($query_cliente);
    $consulta_cliente->bind_param("s", $username);
    $consulta_cliente->execute();
    $resultado_cliente = $consulta_cliente->get_result();

    if ($resultado_cliente->num_rows > 0) {
        // El usuario es un cliente
        $info_cliente = $resultado_cliente->fetch_assoc();
        if (password_verify($contrasena, $info_cliente['contrasena']) AND $info_cliente['verificado'] == 'True') {
            header("Location: ../paginas/portal_cliente.php");
            // exit();
        }else {
            header("Location: ../index.php?errorusuario=SI");
        }
    } else {
        // Si no se encuentra en ninguna de las dos tablas
        header("Location: ../index.php?errorusuario=SI");
    }
}
mysqli_free_result($resultado_cliente);
mysqli_free_result($resultado_empleado);
mysqli_close($conectar);
exit();
?>






$comparar = "SELECT * FROM registros WHERE username = '$username' LIMIT 1";
$resultado = mysqli_query($conectar, $comparar);

//Recuperamos de la base los campos nombre y apellido de la tabla registros ordenado por id y limitando a 1
$info_datos = "SELECT username FROM usuarios ORDER BY id LIMIT 1";
$info = mysqli_query($conectar, $info_datos);
$fila = $info->fetch_array();

if (mysqli_num_rows($resultado) > 0) {
$fila = $resultado->fetch_array();

if (password_verify($contrasena, $fila['contrasena'])) {
session_start();

//Para no repetir el tiempo de expiracion en dos archivos php lo mandaremos por una variable $_session de esa manera podriamos solo cambiarlo en un solo lugar
$_SESSION["tiempo_expiracion"] = 60*10;

// creamos la cookie con valor de tiempo de expiración y una fecha&tiempo de expiracion
setcookie("sesion_iniciada", time() + $_SESSION["tiempo_expiracion"], time() + $_SESSION["tiempo_expiracion"], "/");

//Crear usuario con los datos recuperados y una variable autentificar para usarlos mas adelante
$_SESSION['user'] = $fila['username'];
$_SESSION['autentificado'] = "SI";

//redireccionamos
header("Location:../paginas/dashboard.php");
} else {
header("Location: ../index.php?errorusuario=SI");
}
} else {
header("Location: ../index.php?errorusuario=SI");
}
mysqli_free_result($resultado);
mysqli_close($conectar);