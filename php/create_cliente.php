<?php 
// require './seguridad.php';
include "conexion.php";

$nombres = addslashes($_POST['nombres']);
$correo = addslashes($_POST['correo']);
$apellidos = addslashes($_POST['apellidos']);
$telefono = addslashes($_POST['telefono']);
$direccion = addslashes($_POST['direccion']);
// $contrasena = addslashes($_POST['contrasena']);
$preescripcion = addslashes($_POST['preescripcion']);

// echo $nombres."<br>";
// echo $apellidos."<br>";
// echo $correo."<br>";
// echo $telefono."<br>";
// echo $direccion."<br>";
// echo $contrasena."<br>";
// echo $preescripcion."<br>";
// exit();

//verificar correo en clientes
$verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

if(mysqli_num_rows($verificar_correo)){
    echo '
    <script>
    alert("Este correo [ '.$correo.' ] ya esta en uso por un cliente.")
    location.href="../paginas/registrar_cliente.php";
    </script>
    ';
    exit();
}

//verificar correo en empleados
$verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");

if(mysqli_num_rows($verificar_correo)){
    echo '
    <script>
    alert("Este correo [ '.$correo.' ] ya esta en uso por un empleado.")
    location.href="../paginas/registrar_cliente.php";
    </script>
    ';
    exit();
}
//Contraseña encriptada
// $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

//Guardar datos en la base de datos
$insert  = "INSERT INTO  clientes (nombres, apellidos, correo, telefono, direccion, preescripcion, rol, verificado) VALUE('$nombres', '$apellidos','$correo','$telefono','$direccion','$preescripcion', 'Cliente', 'False')";

$query = mysqli_query($conectar, $insert);

if($query){
    echo '<script>
    alert("Los datos se registraron correctamente")
    location.href="../paginas/mostrar_clientes.php";
    </script>';
}else{
    echo'
    <script>
    alert("ERROR: Fallo el resgitro de los datos en la base de datos");
    location.href="../paginas/registrar_cliente.php";
    </script>
    ';
}

?>