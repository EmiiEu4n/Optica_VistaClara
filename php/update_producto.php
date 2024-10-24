<?php
require './seguridad.php';
require "./conexion.php";
$id = addslashes($_POST['id_producto']);

$resultado = $conectar->QUERY("SELECT nombre AS producto, img FROM productos WHERE id_producto = '$id'");
$nombre_prod = $resultado->fetch_array();
$antiguo_nombre = $nombre_prod['producto'];
$antigua_imagen = $nombre_prod['img'];

$nombre = addslashes($_POST['nombre']);
$id_categoria = addslashes($_POST['id_categoria']);
$precio = addslashes($_POST['precio']);
$descripcion = addslashes($_POST['descripcion']);
$stock = addslashes($_POST['stock']);
$id_proveedor = addslashes($_POST['id_proveedor']);

// echo $antiguo_nombre . "<br>";
// echo $nombre . "<br>";
// echo $id . "<br>";
// echo $id_categoria . "<br>";
// echo $precio . "<br>";
// echo $descripcion . "<br>";
// echo $stock . "<br>";
// echo $id_proveedor . "<br>";

// exit();
if ($nombre != $antiguo_nombre) {

  $verificar_producto = mysqli_query($conectar, "SELECT * FROM productos WHERE nombre = '$nombre'");

  if (mysqli_num_rows($verificar_producto)) {
    echo '
    <script>
     alert("Este producto ya ha sido registrado")
     location.href="../paginas/editar_producto.php?id=' . $id . '";
    </script>
 ';
    exit();
  }
  //validar si se asigno una nueva imagen
  if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['tmp_name'])) {

    // Cargamos los datos de la nueva imagen
    $rutaEnServidor = '../productos';
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $nombreImagen = $_FILES['imagen']['name'];

    // para que no se sobreescriba los nombres 
    date_default_timezone_set('UTC');
    $nombreimagenunica = date('Y-m-d-h-i-s') . "-" . $nombreImagen;

    $rutaDestino = $rutaEnServidor . "/" . $nombreimagenunica;
    // validacion del peso de la imagen
    $pesofoto = $_FILES['imagen']['size'];
    $tipofoto = $_FILES['imagen']['type'];

    if ($pesofoto > 900000) {
      echo '
        <script>
        alert("Es demasiado pesada la foto del producto");
        window.history.go(-1);
        </script>
        ';
      exit();
    }

    if ($tipofoto == "image/webp" or $tipofoto == "image/jpeg" or $tipofoto == "image/png" or $tipofoto == "image/gif" or $tipofoto == "image/jpg" or $nombreImagen == "") {

      // Borramos la antigua imagen con el metodo unlink. Revisamos si existe y que no esta vacia la variable.
      if (file_exists($antigua_imagen) && !empty($antigua_imagen)) {
        // Eliminamos la imagen
        if (!unlink($antigua_imagen)) {
          echo '<script>alert("Error: Hubo un error al intentar eliminar la imagen");window.history.go(-1);</script>';
        }
      }

      move_uploaded_file($rutaTemporal, $rutaDestino);
      //Actualizar datos con imagen
      $actualizar = "UPDATE productos SET nombre = '$nombre', id_categoria = '$id_categoria', precio = '$precio', descripcion = '$descripcion', stock = '$stock', id_proveedor = '$id_proveedor', img = '$rutaDestino' WHERE id_producto = '$id' ";
      $query = mysqli_query($conectar, $actualizar);
    } else {
      echo '
        <script>
        alert("Error: Tipo de imagen no soportado");
        window.history.go(-1);
        </script>
        ';
      exit();
    }
  } else {
    //Actualizar datos sin imagen
    $actualizar = "UPDATE productos SET nombre = '$nombre', id_categoria = '$id_categoria', precio = '$precio', descripcion = '$descripcion', stock = '$stock', id_proveedor = '$id_proveedor' WHERE id_producto = '$id' ";
    $query = mysqli_query($conectar, $actualizar);
  }
  //Redireccionar
  if ($query) {
    echo '<script>
    alert("Se actualizaron los datos de manera correcta")
    location.href="../paginas/ver_producto.php?id=' . $id . '";
    </script>';
  } else {
    echo '
    <script>
    alert("Error: NO se pudo actualizar la información de la base de datos");
    location.href = "../paginas/mostrar_productos.php";
    </script>
    ';
  }
} else {

  //validar si se asigno una nueva imagen
  if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['tmp_name'])) {

    // Cargamos los datos de la nueva imagen
    $rutaEnServidor = '../productos';
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $nombreImagen = $_FILES['imagen']['name'];

    // para que no se sobreescriba los nombres 
    date_default_timezone_set('UTC');
    $nombreimagenunica = date('Y-m-d-h-i-s') . "-" . $nombreImagen;

    $rutaDestino = $rutaEnServidor . "/" . $nombreimagenunica;
    // validacion del peso de la imagen
    $pesofoto = $_FILES['imagen']['size'];
    $tipofoto = $_FILES['imagen']['type'];

    if ($pesofoto > 900000) {
      echo '
        <script>
        alert("Es demasiado pesada la foto del producto");
        window.history.go(-1);
        </script>
        ';
    }

    if ($tipofoto == "image/webp" or $tipofoto == "image/jpeg" or $tipofoto == "image/png" or $tipofoto == "image/gif" or $tipofoto == "image/jpg" or $nombreImagen == "") {

      // Borramos la antigua imagen con el metodo unlink. Revisamos si existe y que no esta vacia la variable.
      if (file_exists($antigua_imagen) && !empty($antigua_imagen)) {
        // Eliminamos la imagen
        if (!unlink($antigua_imagen)) {
          echo '<script>alert("Error: Hubo un error al intentar eliminar la imagen");window.history.go(-1);</script>';
        }
      }

      move_uploaded_file($rutaTemporal, $rutaDestino);
      //Actualizar datos con imagen
      $actualizar = "UPDATE productos SET id_categoria = '$id_categoria', precio = '$precio', descripcion = '$descripcion', stock = '$stock', id_proveedor = '$id_proveedor', img = '$rutaDestino' WHERE id_producto = '$id' ";
      $query = mysqli_query($conectar, $actualizar);
    } else {
      echo '
        <script>
        alert("Error: Tipo de imagen no soportado");
        window.history.go(-1);
        </script>
        ';
      exit();
    }
  } else {
    //Actualizar datos sin imagen
    $actualizar = "UPDATE productos SET id_categoria = '$id_categoria', precio = '$precio', descripcion = '$descripcion', stock = '$stock', id_proveedor = '$id_proveedor' WHERE id_producto = '$id' ";
    $query = mysqli_query($conectar, $actualizar);
  }
  //Redireccionar
  if ($query) {
    echo '<script>
    alert("Se actualizaron los datos de manera correcta")
    location.href="../paginas/ver_producto.php?id=' . $id . '";
    </script>';
  } else {
    echo '
    <script>
    alert("Error: NO se pudo actualizar la información de la base de datos");
    location.href = "../paginas/mostrar_productos.php";
    </script>
    ';
  }
}
