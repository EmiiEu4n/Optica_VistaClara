<?php
// require './seguridad.php';
require "conexion.php";

// informacion antigua
$antiguo_correo = addslashes($_POST['a_correo']);
$antigua_verificado = addslashes($_POST['a_verificado']);
$origen = isset($_GET['origen']) ? $_GET['origen'] : "";

// informacion nueva
$id = addslashes($_POST['id']);
$nombres = addslashes($_POST['nombres']);
$correo = addslashes($_POST['correo']);
$apellidos = addslashes($_POST['apellidos']);
$telefono = addslashes($_POST['telefono']);
$direccion = addslashes($_POST['direccion']);
// $contrasena = addslashes($_POST['contrasena']);
$preescripcion = addslashes($_POST['prescripcion']);
$verificado = "False"; //addslashes($_POST['verificacion']);

// echo $antiguo_correo."<br>";
// echo $antigua_contrasena."<br>";
// echo "Nuevos: <br>";
// echo $id."<br>";
// echo $nombres."<br>";
// echo $correo."<br>";
// echo $apellidos."<br>";
// echo $telefono."<br>";
// echo $direccion."<br>";
// echo $contrasena."<br>";
// echo $preescripcion."<br>";

// exit();
// if ($verificado != $antigua_verificado) {
//  echo "Se cambia el verificado";
// exit();
//Verificar correo
if ($antiguo_correo != $correo) {

    //Verificar el correo en tabla clientes
    $verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

    if (mysqli_num_rows($verificar_correo)) {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se actualizo el cliente!";
        $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un cliente del sistema.";
        echo '<script> window.history.go(-1); </script>';
        exit();
    }

    //Verificar el correo en la tabla empleados
    $verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");

    if (mysqli_num_rows($verificar_correo)) {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se actualizo el cliente!";
        $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un empleado o administrador del sistema.";
        echo '<script> window.history.go(-1); </script>';
        exit();
    }

    //Actualizar datos
    $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion', verificado = '$verificado' WHERE id_cliente = '$id'";
    $query = mysqli_query($conectar, $actualizar);
} else {
    //Actualizar datos
    $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion', verificado = '$verificado' WHERE id_cliente = '$id'";
    $query = mysqli_query($conectar, $actualizar);
}
// } else {
//     //  echo "NO se cambia el verificado";
//     // exit();
//     if ($antiguo_correo != $correo) {

//         //Verificar el correo en tabla clientes
//         $verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

//         if (mysqli_num_rows($verificar_correo)) {
//             session_start();
//             $_SESSION['icon'] = "error";
//             $_SESSION['titulo'] = "¡NO se actualizo el cliente!";
//             $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un cliente del sistema.";
//             echo '<script> window.history.go(-1); </script>';
//             exit();
//         }

//         //Verificar el correo en la tabla empleados
//         $verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");

//         if (mysqli_num_rows($verificar_correo)) {
//             session_start();
//             $_SESSION['icon'] = "error";
//             $_SESSION['titulo'] = "¡NO se actualizo el cliente!";
//             $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un empleado o administrador del sistema.";
//             echo '<script> window.history.go(-1); </script>';
//             exit();
//         }

//         //Actualizar datos
//         $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion' WHERE id_cliente = '$id'";
//         $query = mysqli_query($conectar, $actualizar);
//     } else {
//         //Actualizar datos
//         $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion' WHERE id_cliente = '$id'";
//         $query = mysqli_query($conectar, $actualizar);
//     }

//     //FIN
// }


if ($query) {
    session_start();
    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Actualizado!";
    $_SESSION['sms'] = "Se actualizó los datos del cliente exitosamente";

    // Construir la URL de redirección correctamente
    //preguntar si el origen es clientes
    if ($origen == 'usuariosver' || $origen == 'usuarios') {
        $url = "../paginas/ver_cliente.php?origen=usuarios&id=" . $id;
        header("Location: " . $url);
        exit();
    }else if($origen == 'perfil'){
        $url = "../paginas/portal_cliente.php";
        header("Location: " . $url);
        exit();
    }

    $url = "../paginas/ver_cliente.php?id=" . $id;
    header("Location: " . $url);
    exit(); // Asegúrate de salir después de redirigir

} else {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se actualizo los datos del cliente!";
    $_SESSION['sms'] = "Error: " . mysqli_error($conectar);
    echo '<script> window.history.go(-1); </script>';
    exit();
}
