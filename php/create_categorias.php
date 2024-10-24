<?php
require "conexion.php";

$nombrecategoria = addslashes($_POST['nombre_categoria']);

$verificar_categoria = mysqli_query($conectar, "SELECT * FROM categorias WHERE nombre_categoria = '$nombrecategoria'");

if(mysqli_num_rows($verificar_categoria)){
    echo '
    <script>
    alert("Esta categoría [ '.$nombrecategoria.' ] ya esta registrado.")
    window.history.go(-1);
    </script>
    ';
    exit();
}

$insertar = "INSERT INTO categorias (nombre_categoria) VALUES ('$nombrecategoria')";
$query = mysqli_query($conectar, $insertar);
if ($query) {
echo '
<script>
alert("SE GUARDARO EL PRODUCTO CORRECTAMENTE");
location.href="../paginas/mostrar_categoria.php";
</script>
';
} else {
echo '
<script>
alert("NO SE GUARDO EL POST");
location.href="../paginas/registrar_categoria.php";
</script>
';
}