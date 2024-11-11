<?php

function notify()
{
    //Notificaciones
    if (isset($_SESSION["icon"])) {
        if ($_SESSION['icon'] == 'success') {
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                    notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                    });
                    </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        } else if ($_SESSION['icon'] == 'error') {
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                    notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                    });
                    </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        } else if ($_SESSION['icon'] == 'warning') {
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                    notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                    });
                    </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        } else if ($_SESSION['icon'] == 'info') {
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                    notificacion("' . $_SESSION['titulo'] . '", "' . $_SESSION['sms'] . '", "' . $_SESSION['icon'] . '");
                    });
                    </script>';
            unset($_SESSION['icon']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['titulo']); // Elimina la variable de sesión después de usarla
            unset($_SESSION['sms']); // Elimina la variable de sesión después de usarla
        }
    }
}
