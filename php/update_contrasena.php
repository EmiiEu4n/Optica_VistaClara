<?php

include "./conexion.php";
$origen = isset($_GET['origen']) ? $_GET['origen'] : "";

if ($origen == "empleados" || $origen == "clientes") {
    $contrasena_actual = addslashes($_POST['contrasena-actual']);
}
$contrasena_nueva = addslashes($_POST['contrasena-nueva']);
// echo $origen."..";
// echo $contrasena_actual;
// echo $contrasena_nueva;
// exit();


//Se verifica de donde se esta llamando el archivo
if ($origen == 'empleados') {
    //Variables
    session_start();
    $id = $_SESSION['id'];

    //Instruccion
    $comprobar_contrasena = "SELECT contrasena FROM empleados where id_empleado ='$id'";
    //Query
    $query = mysqli_query($conectar, $comprobar_contrasena);

    if ($query->num_rows > 0) {
        // El usuario es un empleado
        $info_empleado = $query->fetch_assoc();
        if (password_verify($contrasena_actual, $info_empleado['contrasena'])) {
            $contrasena_encriptada = password_hash($contrasena_nueva, PASSWORD_DEFAULT);
            $actualizar_contrasena = "UPDATE empleados SET contrasena = '$contrasena_encriptada' WHERE id_empleado = '$id'";
            $query = mysqli_query($conectar, $actualizar_contrasena);
            if ($query) {
                session_start();
                $_SESSION['icon'] = "success";
                $_SESSION['titulo'] = "¡Contraseña actualizada!";
                $_SESSION['sms'] = "La nueva contraseña se ha actualizado correctamente, cierre y vuelva a iniciar sesión con su nueva contraseña";
                // Construir la URL de redirección correctamente
                $url = "../paginas/perfil_empleado.php";
                header("Location: " . $url);
                exit(); // Asegúrate de salir después de redirigir

            } else {
                session_start();
                $_SESSION['icon'] = "error";
                $_SESSION['titulo'] = "¡Contraseña NO actualizada!";
                $_SESSION['sms'] = "Error: " . mysqli_error($conectar);
                echo '<script> window.history.go(-1); </script>';
            }
        } else {
            $_SESSION['icon'] = "error";
            $_SESSION['titulo'] = "¡Contraseña Incorrecta!";
            $_SESSION['sms'] = "La contraseña ingresada no es correcta. Por favor, inténtelo nuevamente o restablezca su contraseña.";

            // exit();
            echo '<script> window.history.go(-1); </script>';
        }
    }
} else if ($origen == 'clientes') {
    session_start();
    $id = $_SESSION['id_cliente'];
    //Instruccion
    $comprobar_contrasena = "SELECT contrasena FROM clientes where id_cliente ='$id'";
    //Query
    $query = mysqli_query($conectar, $comprobar_contrasena);

    if ($query->num_rows > 0) {
        // El usuario es un empleado
        $info_clientes = $query->fetch_assoc();
        if (password_verify($contrasena_actual, $info_clientes['contrasena'])) {
            $contrasena_encriptada = password_hash($contrasena_nueva, PASSWORD_DEFAULT);
            $actualizar_contrasena = "UPDATE clientes SET contrasena = '$contrasena_encriptada' WHERE id_cliente = '$id'";
            $query = mysqli_query($conectar, $actualizar_contrasena);
            if ($query) {
                session_start();
                $_SESSION['icon'] = "success";
                $_SESSION['titulo'] = "¡Contraseña actualizada!";
                $_SESSION['sms'] = "La nueva contraseña se ha actualizado correctamente, cierre y vuelva a iniciar sesión con su nueva contraseña";
                // Construir la URL de redirección correctamente
                $url = "../paginas/perfil_cliente.php";
                header("Location: " . $url);
                exit(); // Asegúrate de salir después de redirigir

            } else {
                session_start();
                $_SESSION['icon'] = "error";
                $_SESSION['titulo'] = "¡Contraseña NO actualizada!";
                $_SESSION['sms'] = "Error: " . mysqli_error($conectar);
                echo '<script> window.history.go(-1); </script>';
            }
        } else {
            $_SESSION['icon'] = "error";
            $_SESSION['titulo'] = "¡Contraseña Incorrecta!";
            $_SESSION['sms'] = "La contraseña ingresada no es correcta. Por favor, inténtelo nuevamente o restablezca su contraseña.";

            // exit();
            echo '<script> window.history.go(-1); </script>';
        }
    }
} else if ($origen == 'restablecer') {

    session_start();
    $correo = $_SESSION['correo_electronico'];
    $tabla = $_SESSION['tabla'];
    if ($tabla == "clientes") {
        $campo_codigo = "codigo_cliente";
    } else {
        $campo_codigo = "codigo_empleado";
    }

    // echo $correo;
    // echo $tabla;
    // exit();
    // Encripta la contraseña nueva
    $contrasena_encriptada = password_hash($contrasena_nueva, PASSWORD_DEFAULT);

    // Prepara la consulta SQL
    $stmt = $conectar->prepare("UPDATE $tabla SET contrasena = ? WHERE correo = ?");
    $stmt->bind_param("ss", $contrasena_encriptada, $correo);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        //Resetear el codigo
        $stmt = $conectar->prepare("UPDATE $tabla SET $campo_codigo = null WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        //Desactivar variables de session
        unset($_SESSION['correoEnviado']);
        unset($_SESSION['codigoVerificado']);
        unset($_SESSION['correo_electronico']);
        unset($_SESSION['tabla']);
        // Redirige si la actualización fue exitosa
        $_SESSION['icon'] = "success";
        $_SESSION['titulo'] = "¡Actualización Exitosa!";
        $_SESSION['sms'] = "Tu contraseña se ha restablecido exitosamente. ¡Enhorabuena!";
        header("Location: ../index.php");
    } else {
        // Manejar el error si ocurre
        echo "Error al actualizar la contraseña.";
    }

    // Cierra la declaración y la conexión
    $stmt->close();
    $conectar->close();
} else {
    echo '<script> window.history.go(-1); </script>';
}
