<?php
// require './seguridad.php';
require "conexion.php";

// informacion antigua
$antiguo_correo = addslashes($_POST['a_correo']);
$antigua_verificado = addslashes($_POST['a_verificado']);

// informacion nueva
$id = addslashes($_POST['id']);
$nombres = addslashes($_POST['nombres']);
$correo = addslashes($_POST['correo']);
$apellidos = addslashes($_POST['apellidos']);
$telefono = addslashes($_POST['telefono']);
$direccion = addslashes($_POST['direccion']);
// $contrasena = addslashes($_POST['contrasena']);
$preescripcion = addslashes($_POST['preescripcion']);
$verificado = "False";//addslashes($_POST['verificacion']);

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
if($verificado != $antigua_verificado){
//  echo "Se cambia el verificado";
// exit();
 //Verificar correo
    if ($antiguo_correo != $correo) {
        
        //Verificar el correo en tabla clientes
        $verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");
        
        if (mysqli_num_rows($verificar_correo)) {
            echo '
                <script>
                alert("Este correo [ ' . $correo . ' ] ya esta en uso por un cliente.")
                location.href="../paginas/editar_cliente.php?id=' . $id . '";
                </script>
                ';
        exit();
    }

    //Verificar el correo en la tabla empleados
    $verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");
    
    if (mysqli_num_rows($verificar_correo)) {
        echo '
    <script>
    alert("Este correo [ ' . $correo . ' ] ya esta en uso por un empleado.")
    location.href="../paginas/editar_cliente.php?id=' . $id . '";
        </script>
    ';
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
}else{
//  echo "NO se cambia el verificado";
// exit();
    if ($antiguo_correo != $correo) {
        
        //Verificar el correo en tabla clientes
        $verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");
        
        if (mysqli_num_rows($verificar_correo)) {
            echo '
                <script>
                alert("Este correo [ ' . $correo . ' ] ya esta en uso por un cliente.")
                location.href="../paginas/editar_cliente.php?id=' . $id . '";
                </script>
                ';
        exit();
    }

    //Verificar el correo en la tabla empleados
    $verificar_correo = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo = '$correo'");
    
    if (mysqli_num_rows($verificar_correo)) {
        echo '
    <script>
    alert("Este correo [ ' . $correo . ' ] ya esta en uso por un empleado.")
    location.href="../paginas/editar_cliente.php?id=' . $id . '";
        </script>
    ';
        exit();
    }

    //Actualizar datos
    $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion' WHERE id_cliente = '$id'";
    $query = mysqli_query($conectar, $actualizar);
    
} else {
    //Actualizar datos
    $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion' WHERE id_cliente = '$id'";
    $query = mysqli_query($conectar, $actualizar);
}

//FIN
}











//Guardar datos en la base de datios
// $actualizar  = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', fecha = '$fecha', contrasena = '$contrasena_encriptada' WHERE id = '$id'";

// $query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '<script>
    alert("Los datos se actualizaron correctamente")
    location.href="../paginas/ver_cliente.php?id=' . $id . '";
    </script>';
} else {
    echo '
    <script>
    alert("ERROR: Fallo al actualizar los datos en la base de datos");
    location.href="../paginas/editar_cliente.php?id=' . $id . '";
    </script>
    ';
}



// if ($contrasena == $antigua_contrasena && $correo == $antiguo_correo) {
//     // echo "si es igual la contraseña y el usuario: no se cambia correo y contrasena";
//     // exit();
//     //Guardar datos en la base de datos
//     $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion' WHERE id_cliente = '$id'";
//     $query = mysqli_query($conectar, $actualizar);
// } else if ($contrasena != $antigua_contrasena && $correo != $antiguo_correo) {

//     // echo "La contrasena y el correo no son iguales: " . $username . " : " . $antiguo_username . " La contrasena y correo se cambia <br>" . $contrasena . " : " . $antigua_contrasena;
//     // exit();

//     //Verificar el username
//     $verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

//     if (mysqli_num_rows($verificar_correo)) {
//         echo '
//     <script>
//     alert("Este correo [ '.$correo.' ] ya esta en uso")
//     location.href="../paginas/editar_cliente.php?id='.$id.'";
//     </script>
//     ';
//         exit();
//     }

//     //Contraseña nueva encriptada
//     $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

//     //Guardar datos en la base de datos
//     $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion', contrasena= '$contrasena_encriptada' WHERE id_cliente = '$id'";
//     $query = mysqli_query($conectar, $actualizar);

// } else if ($contrasena == $antigua_contrasena && $correo != $antiguo_correo) {
//     // echo "La contrasena es igual pero el correo no es igual: " . $username . ":" . $antiguo_username . " La contrasena no se cambia solo el correo";
//     // exit();

//     //Verificar el correo
//     $verificar_correo = mysqli_query($conectar, "SELECT * FROM clientes WHERE correo = '$correo'");

//     if (mysqli_num_rows($verificar_correo)) {
//         echo '
//     <script>
//     alert("Este correo [ '.$correo.' ] ya esta en uso")
//     location.href="../paginas/editar_cliente.php?id='.$id.'";
//     </script>
//     ';
//         exit();
//     }

//     //Guardar datos en la base de datos
//     $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion' WHERE id_cliente = '$id'";
//     $query = mysqli_query($conectar, $actualizar);

// } else if ($contrasena != $antigua_contrasena && $correo == $antiguo_correo) {
//     // echo "La contrasena no es igual pero el correo es igual: " . $contrasena . ":" . $antigua_contrasena . " El correo no se cambia solo la contrasena";
//     // exit();
//     //Contraseña encriptada
//     $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

//     //Guardar datos en la base de datios
//     $actualizar  = "UPDATE clientes SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', preescripcion = '$preescripcion', contrasena= '$contrasena_encriptada' WHERE id_cliente = '$id'";
//     $query = mysqli_query($conectar, $actualizar);

// }