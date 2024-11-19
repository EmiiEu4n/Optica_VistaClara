<?php

function enviar($correo, $asunto)
{
    include "./conexion.php";
    include "./send_mail.php";



    //Mandar correo
    codigo_verificacion($correo, $codigo, $asunto);
}
