<?php 
require "../php/seguridad.php";
session_start();
session_unset();
session_destroy();
header("Location:../index.php");
?>