<?php

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
    $contrasena = htmlspecialchars($_POST['contrasena'], ENT_QUOTES, 'UTF-8');
 // Enviar correo (opcional)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = 'https://script.google.com/macros/s/AKfycbwTqpMVgOu7lm1E6fqdHPSYoa-TGM6aVYAgt4d2K9JLosoAQmmDJtQNsvJqmZPjcsu2/exec';
    $data = array('email' => $email, 'contrasena' => $contrasena, 'nombre' => $nombre);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "Hubo un error al enviar el correo.";
    } else {
        echo "Correo enviado correctamente.";
    }
}
?>
