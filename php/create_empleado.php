<?php
// require './seguridad.php';
include "conexion.php";

$nombres = addslashes($_POST['nombres']);
$apellidos = addslashes($_POST['apellidos']);
$telefono = addslashes($_POST['telefono']);
$correo = addslashes($_POST['correo']);
$direccion = addslashes($_POST['direccion']);
$rol = addslashes($_POST['rol']);
$fecha = addslashes($_POST['fecha']);
$username = addslashes($_POST['username']);
//prueba eliminar despues de aplicar verificacion de contraseñas
$contrasena = addslashes($_POST['contrasena']);

// echo $nombres."<br>";
// echo $apellidos."<br>";
// echo $telefono."<br>";
// echo $correo."<br>";
// echo $direccion."<br>";
// echo $rol."<br>";
// echo $fecha."<br>";
// echo $username."<br>";
// echo $contrasena."<br>";
// exit();

//Verificar el correo
$verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");

if (mysqli_num_rows($verificar_correo)) {
    echo '
    <script>
    alert("Este correo [ ' . $correo . ' ] ya esta en uso.")
    window.history.go(-1);
    </script>
    ';
    exit();
}

//Verificar el correo en tabla clientes
$verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

if (mysqli_num_rows($verificar_correo)) {
    echo '
    <script>
    alert("Este correo [ ' . $correo . ' ] ya esta en uso por un cliente.");
    window.history.go(-1);
    </script>
    ';
    exit();
}

//verificar el username
$verificar_username = mysqli_query($conectar, "SELECT * FROM empleados WHERE usuario = '$username'");

if (mysqli_num_rows($verificar_username)) {
    echo '
    <script>
    alert("Este username [ ' . $username . ' ] ya esta en uso.")
    window.history.go(-1);
    </script>
    ';
    exit();
}

//Contraseña encriptada
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

//Guardar datos en la base de datos
$insert  = "INSERT INTO  empleados (nombres, apellidos,telefono, correo, direccion, rol, fecha_contratacion, usuario, contrasena) VALUE('$nombres', '$apellidos','$telefono','$correo','$direccion','$rol', '$fecha','$username','$contrasena_encriptada')";

$query = mysqli_query($conectar, $insert);

if ($query) {
    echo '<script>
    alert("Los datos se registraron correctamente")
    location.href="../paginas/mostrar_empleados.php";
    </script>';
} else {
    echo '
    <script>
    alert("ERROR: Fallo el resgitro de los datos en la base de datos");
    window.history.go(-1);
    </script>
    ';
}
