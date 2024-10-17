<?php 

$host = "localhost";
$user = "root";
$key = "";
$bd = "bd_ovc";
$conectar = mysqli_connect($host, $user, $key, $bd);

if(!$conectar){
    echo "No se conecto a la base de datos" . $bd;
};

?>