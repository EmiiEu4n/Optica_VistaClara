<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

function welcome_pass($correo, $nombre, $contrasena)
{
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gaspareuan155@gmail.com';
        $mail->Password   = 'nerscgkwzsayjyvh'; // Reemplaza con tu contraseña segura
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet = 'UTF-8';

        // Remitente y destinatario
        $mail->setFrom('no-reply@optica-vc.com', 'Optica VC');
        $mail->addAddress($correo);

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = mb_convert_encoding("Cuenta creado con éxito", 'ISO-8859-1', 'UTF-8');

        // Leer la plantilla HTML desde el archivo
        $plantilla = file_get_contents( "../template_correos/welcome_pass.html"); 
        // Reemplaza las variables en la plantilla
        $plantilla = str_replace('{{nombre}}', mb_convert_encoding($nombre, 'ISO-8859-1', 'UTF-8'), $plantilla);
        $plantilla = str_replace('{{correo}}', $correo, $plantilla);
        $plantilla = str_replace('{{contrasena}}', $contrasena, $plantilla);

        $mail->Body    = $plantilla;

        $mail->send();
        return 0;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}

function welcome_worker($correo, $username, $nombre, $contrasena)
{
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gaspareuan155@gmail.com';
        $mail->Password   = 'nerscgkwzsayjyvh'; // Reemplaza con tu contraseña segura
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet = 'UTF-8';

        // Remitente y destinatario
        $mail->setFrom('no-reply@optica-vc.com', 'Optica VC');
        $mail->addAddress($correo);

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = mb_convert_encoding("¡Bienvenido a la familia!", 'ISO-8859-1', 'UTF-8');

        // Leer la plantilla HTML desde el archivo
        $plantilla = file_get_contents("../template_correos/welcome_worker.html"); 
        // Reemplaza las variables en la plantilla
        $plantilla = str_replace('{{nombre}}', mb_convert_encoding($nombre, 'ISO-8859-1', 'UTF-8'), $plantilla);
        $plantilla = str_replace('{{username}}', $username, $plantilla);
        $plantilla = str_replace('{{contrasena}}', $contrasena, $plantilla);

        $mail->Body    = $plantilla;

        $mail->send();
        return 0;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}


function welcome($correo, $nombre)
{
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gaspareuan155@gmail.com';
        $mail->Password   = 'nerscgkwzsayjyvh'; // Reemplaza con tu contraseña segura
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet = 'UTF-8';

        // Remitente y destinatario
        $mail->setFrom('no-reply@optica-vc.com', 'Optica VC');
        $mail->addAddress($correo);

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = mb_convert_encoding("Cuenta creado con éxito", 'ISO-8859-1', 'UTF-8');

        // Leer la plantilla HTML desde el archivo
        $plantilla = file_get_contents("../template_correos/welcome.html"); 
        // Reemplaza las variables en la plantilla
        $plantilla = str_replace('{{nombre}}', mb_convert_encoding($nombre, 'ISO-8859-1', 'UTF-8'), $plantilla);
        $plantilla = str_replace('{{correo}}', $correo, $plantilla);

        $mail->Body    = $plantilla;

        $mail->send();
        return 0;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}


function confirm_cita($correo, $nombre, $hora, $fecha, $motivo)
{
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gaspareuan155@gmail.com';
        $mail->Password   = 'nerscgkwzsayjyvh'; // Reemplaza con tu contraseña segura
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Configura la codificación a UTF-8
        $mail->CharSet = 'UTF-8';

        // Remitente y destinatario
        $mail->setFrom('no-reply@optica-vc.com', 'Optica VC');
        $mail->addAddress($correo);
        
        // Contenido
        $mail->isHTML(true);
        $mail->Subject = "Cita Creada con éxito";

        // Leer la plantilla HTML desde el archivo
        $plantilla = file_get_contents("../template_correos/confirm_cita.html"); 

        // Reemplaza las variables en la plantilla
        $plantilla = str_replace('{{nombre_cliente}}', $nombre, $plantilla);
        $plantilla = str_replace('{{fecha_cita}}', $fecha, $plantilla);
        $plantilla = str_replace('{{hora_cita}}', $hora, $plantilla);
        $plantilla = str_replace('{{motivo_cita}}', $motivo, $plantilla);

        // Establecer el contenido del correo
        $mail->Body   = $plantilla;

        // Enviar correo
        $mail->send();
        return 0;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}


