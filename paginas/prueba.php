<?php 
session_start();
$hola = "hola";
$_SESSION['icon'] = "success";
$_SESSION['titulo'] = "Buen Trabajo!";
$_SESSION['sms'] = "$hola fecha | hora";

echo '<script>
window.history.go(-1); 
</script>';
exit();
?>