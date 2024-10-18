<?php 
// require './seguridad.php';
include "conexion.php";

$nombre = addslashes($_POST['nombre']);
$contacto = addslashes($_POST['contacto']);
$correo = addslashes($_POST['correo']);
$telefono = addslashes($_POST['telefono']);
$direccion = addslashes($_POST['direccion']);
$suministro = addslashes($_POST['suministro']);

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
$verificar_empresa = mysqli_query($conectar, "SELECT * FROM proveedor WHERE nombre = '$nombre'");

if(mysqli_num_rows($verificar_correo)){
    echo '
    <script>
    alert("Esta empresa [ '.$nombre.' ] ya esta registrada.")
    location.href="../paginas/registrar_proveedor.php";
    </script>
    ';
    exit();
}


//Guardar datos en la base de datos
$insert  = "INSERT INTO  proveedor (nombre, contacto, correo, telefono, direccion, suministro) VALUE('$nombres', '$apellidos','$telefono','$correo','$direccion','$rol', '$fecha','$username','$contrasena_encriptada')";

$query = mysqli_query($conectar, $insert);

if($query){
    echo '<script>
    alert("Los datos se registraron correctamente")
    location.href="../paginas/mostrar_empleados.php";
    </script>';
}else{
    echo'
    <script>
    alert("ERROR: Fallo el resgitro de los datos en la base de datos");
    location.href="../paginas/registrar_empleado.php";
    </script>
    ';
}

?>