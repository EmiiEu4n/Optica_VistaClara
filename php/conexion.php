<?php 
// $host = "localhost";
// $user = "root";
// $key = "";
// $bd = "bd_ovc";
// $conectar = mysqli_connect($host, $user, $key, $bd);

// if(!$conectar){
//     echo "No se conecto a la base de datos" . $bd;
// };

//Base de datos local
// $host = "localhost";
// $user = "root";
// $key = "";
// $bd = "bd_ovc";
// $conectar = mysqli_connect($host, $user, $key, $bd);

// if(!$conectar){
//     echo "No se conecto a la base de datos" . $bd;
// }

//Base de datos externa
$host = "srv1442.hstgr.io"; //Cambiar
$user = ""; //ocultar
$key = ""; //ocultar
$bd = "";
$conectar = mysqli_connect($host, $user, $key, $bd);

if(!$conectar){
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
} else {
    mysqli_set_charset($conectar, 'utf8mb4');
}
?>
