<?php
// require './seguridad.php';
include "conexion.php";
$id = addslashes($_POST['id']);

//informacion de antigua
$resultado = $conectar->QUERY("SELECT nombre FROM proveedores WHERE id_proveedor = '$id'");
$empresa_antigua = mysqli_fetch_assoc($resultado);

//informacion nueva
$nombre = addslashes($_POST['nombre']);
$contacto = addslashes($_POST['contacto']);
$correo = addslashes($_POST['correo']);
$telefono = addslashes($_POST['telefono']);
$direccion = addslashes($_POST['direccion']);

// echo $empresa_antigua['nombre']."<br>";
// echo $nombre."<br>";
// echo $contacto."<br>";
// echo $correo."<br>";
// echo $telefono."<br>";
// echo $direccion."<br>";
// exit();
//Verificar el correo

if ($nombre != $empresa_antigua['nombre']) {

    $verificar_empresa = mysqli_query($conectar, "SELECT * FROM proveedores WHERE nombre = '$nombre'");

    if (mysqli_num_rows($verificar_empresa)) {
        echo '
    <script>
    alert("Esta empresa [ ' . $nombre . ' ] ya esta registrada.")
    location.href="../paginas/editar_proveedor.php?id=' . $id . '";
    </script>
    ';
        exit();
    }


    //Actualizar datos en la base de datos
    $actualizar  = "UPDATE proveedores SET  nombre = '$nombre', contacto = '$contacto', correo = '$correo', telefono = '$telefono', direccion = '$direccion' WHERE id_proveedor = '$id'";
    $query = mysqli_query($conectar, $actualizar);

} else {

    //Actualizar datos en la base de datos
    $actualizar  = "UPDATE proveedores SET  contacto = '$contacto', correo = '$correo', telefono = '$telefono', direccion = '$direccion' WHERE id_proveedor = '$id'";
    $query = mysqli_query($conectar, $actualizar);
}



if ($query) {
    echo '<script>
    alert("Los datos se actualizaron correctamente")
    location.href="../paginas/ver_proveedor.php?id=' . $id . '";
    </script>';
} else {
    echo '
    <script>
    alert("ERROR: Fallo la actualizacion de los datos");
    location.href="../paginas/editar_proveedor.php?id=' . $id . '";
    </script>
    ';
}
