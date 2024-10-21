<?php 
// require './seguridad.php';
include "conexion.php";

$nombre = addslashes($_POST['nombre']);
$contacto = addslashes($_POST['contacto']);
$correo = addslashes($_POST['correo']);
$telefono = addslashes($_POST['telefono']);
$direccion = addslashes($_POST['direccion']);

// echo $nombre."<br>";
// echo $contacto."<br>";
// echo $correo."<br>";
// echo $telefono."<br>";
// echo $direccion."<br>";
// exit();
//Verificar el correo
$verificar_empresa = mysqli_query($conectar, "SELECT * FROM proveedores WHERE nombre = '$nombre'");

if(mysqli_num_rows($verificar_empresa)){
    echo '
    <script>
    alert("Esta empresa [ '.$nombre.' ] ya esta registrada.")
    location.href="../paginas/registrar_proveedor.php";
    </script>
    ';
    exit();
}


//Guardar datos en la base de datos
$insert  = "INSERT INTO  proveedores (nombre, contacto, correo, telefono, direccion) VALUE('$nombre', '$contacto','$correo','$telefono', 'direccion')";

$query = mysqli_query($conectar, $insert);

if($query){
    echo '<script>
    alert("Los datos se registraron correctamente")
    location.href="../paginas/mostrar_proveedores.php";
    </script>';
}else{
    echo'
    <script>
    alert("ERROR: Fallo el resgitro de los datos en la base de datos");
    location.href="../paginas/registrar_proveedores.php";
    </script>
    ';
}

?>