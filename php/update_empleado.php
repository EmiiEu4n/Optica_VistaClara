<?php
// $origen = $_GET['origen'];

// if ($origen == 'usuarios') {
//     echo '
//     <script>
//         window.onload = function() {
//             location.href="../paginas/ver_empleado.php?origen=usuarios&id=' . $id . '&showAlert=true";
//         }
//     </script>';
// }
//  elseif ($origen == 'empleados') {
//     header("location:../paginas/ver_empleado.php?origen=empleados&id=" . $id);
// } elseif ($origen == 'usuariosver') {
//     header("location:../paginas/ver_empleado.php?origen=usuarios&id=" . $id);
// } elseif ($origen == 'empleadosver') {
//     header("location:../paginas/ver_empleado.php?origen=empleados&id=" . $id);
// }
// exit();
// require './seguridad.php';
require "conexion.php";

// informacion antigua
$antiguo_correo = addslashes($_POST['a_correo']);
$antigua_username = addslashes($_POST['a_username']);

// informacion nueva
$id = addslashes($_POST['id']);
$nombres = addslashes($_POST['nombres']);
$apellidos = addslashes($_POST['apellidos']);
$telefono = addslashes($_POST['telefono']);
$correo = addslashes($_POST['correo']);
$direccion = addslashes($_POST['direccion']);
$rol = addslashes($_POST['rol']);
$fecha = addslashes($_POST['fecha']);
$username = addslashes($_POST['username']);

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

if ($username == $antigua_username && $correo == $antiguo_correo) {
    //  no se cambia correo y username
    // exit();
    //Guardar datos en la base de datos
    $actualizar  = "UPDATE empleados SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', rol = '$rol', fecha_contratacion = '$fecha' WHERE id_empleado = '$id'";
    $query = mysqli_query($conectar, $actualizar);
} else if ($username != $antigua_username && $correo != $antiguo_correo) {
    //  El username y correo se cambia
    // exit();

    //Verificar el correo
    $verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");

    if (mysqli_num_rows($verificar_correo)) {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se actualizo los datos del empleado!";
        $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un empleado o administrador del sistema.";
        echo '<script> window.history.go(-1); </script>';
        exit();
    }

    //Verificar el correo en tabla clientes
    $verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

    if (mysqli_num_rows($verificar_correo)) {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se actualizo los datos del empleado!";
        $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un cliente del sistema.";
        echo '<script> window.history.go(-1); </script>';
        exit();
    }

    //verificar el username
    $verificar_username = mysqli_query($conectar, "SELECT * FROM empleados WHERE usuario = '$username'");
    if (mysqli_num_rows($verificar_username)) {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se actualizo los datos del empleado!";
        $_SESSION['sms'] = "El username ingresado ($username) ya esta siendo ocupado por un empleado o administrador del sistema.";
        echo '<script> window.history.go(-1); </script>';
        exit();
    }



    //Guardar datos en la base de datos
    $actualizar  = "UPDATE empleados SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', correo = '$correo', direccion = '$direccion', rol = '$rol', fecha_contratacion = '$fecha', usuario = '$username' WHERE id_empleado = '$id'";
    $query = mysqli_query($conectar, $actualizar);

} else if ($username == $antigua_username && $correo != $antiguo_correo) {
    //  El username no se cambia solo el correo";
    // exit();

    //Verificar el correo
    $verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");

    if (mysqli_num_rows($verificar_correo)) {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se actualizo los datos del empleado!";
        $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un empleado o administrador del sistema.";
        echo '<script> window.history.go(-1); </script>';
        exit();
    }

    //Verificar el correo en tabla clientes
    $verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

    if (mysqli_num_rows($verificar_correo)) {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se actualizo los datos del empleado!";
        $_SESSION['sms'] = "El correo ingresado ($correo) ya esta siendo ocupado por un cliente del sistema.";
        echo '<script> window.history.go(-1); </script>';
        exit();
    }

    //Guardar datos en la base de datos
    $actualizar  = "UPDATE empleados SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', correo = '$correo', direccion = '$direccion', rol = '$rol', fecha_contratacion = '$fecha' WHERE id_empleado = '$id'";
    $query = mysqli_query($conectar, $actualizar);
} else if ($username != $antigua_username && $correo == $antiguo_correo) {
    // El correo no se cambia solo el username";
    // exit();

    //verificar el username
    $verificar_username = mysqli_query($conectar, "SELECT * FROM empleados WHERE usuario = '$username'");
    if (mysqli_num_rows($verificar_username)) {
        session_start();
        $_SESSION['icon'] = "error";
        $_SESSION['titulo'] = "¡NO se actualizo los datos del empleado!";
        $_SESSION['sms'] = "El username ingresado ($username) ya esta siendo ocupado por un empleado o administrador del sistema.";
        echo '<script> window.history.go(-1); </script>';
        exit();
    }

    //Guardar datos en la base de datios
    $actualizar  = "UPDATE empleados SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', rol = '$rol', fecha_contratacion = '$fecha', usuario = '$username' WHERE id_empleado = '$id'";
    $query = mysqli_query($conectar, $actualizar);
}


if ($query) {
    session_start();
    $_SESSION['icon'] = "success";
    $_SESSION['titulo'] = "¡Actualizado!";
    $_SESSION['sms'] = "Se actualizó los datos del $rol exitosamente";

    // Construir la URL de redirección correctamente
    $url = "../paginas/ver_empleado.php?id=" . $id;
    header("Location: " . $url);
    exit(); // Asegúrate de salir después de redirigir
} else {
    session_start();
    $_SESSION['icon'] = "error";
    $_SESSION['titulo'] = "¡NO se registro la empresa!";
    $_SESSION['sms'] = "Error: ". mysqli_error($conectar);
    echo '<script> window.history.go(-1); </script>';
}
