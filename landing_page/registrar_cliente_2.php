<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../landing_page/estilo2.css">

</head>
<body>
  <!-- Botón para abrir el Modal -->
  <!-- <button id="myBtn">Registrarse</button> -->

  <!-- El Modal -->
  <div id="myModal" class="modal">
    <!-- Contenido del Modal -->
    <div class="modal-content">
      <img src="../imagenes/logo2.png" alt="">
      <span class="close">&times;</span>
      <h2>Registro</h2>
      <form id="registroForm" action="#" method="post" novalidate>
        <div class="AJ">
          <label for="nombre">Nombres:</label><br>
          <input type="text" id="nombre" name="nombre" required pattern="[a-zA-Z\s]{3,254}" placeholder="Nombres completos" class="validar-espacios">
          <div class="error-message" id="nombre-error">El nombre debe contener solo letras y espacios (mínimo 3 caracteres)</div>
        </div>
        <div class="AJ">
          <label for="apellido">Apellidos:</label><br>
          <input type="text" id="apellido" name="apellido" required pattern="[a-zA-Z\s]{3,254}" placeholder="Apellidos completos" class="validar-espacios">
          <div class="error-message" id="apellido-error">Los apellidos deben contener solo letras y espacios (mínimo 3 caracteres)</div>
        </div>
        <div class="AJ">
          <label for="direccion">Domicilio:</label><br>
          <input type="text" id="direccion" name="direccion" required pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s\.\-\#\/\°]+$" placeholder="Dirección del domicilio" class="validar-espacios">
          <div class="error-message" id="direccion-error">Por favor ingrese una dirección válida</div>
        </div>
        <div class="AJ">
          <label for="telefono">Teléfono:</label><br>
          <input type="tel" id="telefono" name="telefono" required pattern="[0-9]{10}" placeholder="Teléfono" class="validar-espacios" maxlength="10">
          <div class="error-message" id="telefono-error">El teléfono debe contener 10 dígitos</div>
        </div>
        <div class="AJ">
          <label for="email">Correo Electrónico:</label><br>
          <input type="email" id="email" name="email" required placeholder="Correo Electrónico" class="validar-espacios">
          <div class="error-message" id="email-error">Por favor ingrese un correo electrónico válido</div>
        </div>
        <div class="AJ">
          <label for="password">Contraseña:</label><br>
          <input type="password" id="password" name="password" required placeholder="*********" class="validar-espacios">
          <div class="error-message" id="password-length-error">La contraseña debe tener al menos 8 caracteres</div>
        </div>
        <div class="AJ">
          <label for="confirmar-password">Confirmar Contraseña:</label><br>
          <input type="password" id="confirmar-password" name="confirmar-password" required placeholder="*********" class="validar-espacios">
          <div class="error-message" id="password-error">Las contraseñas no coinciden</div>
        </div>
        <button class="Btn AJ" type="submit">Registrarse</button>
      </form>
    </div>
  </div>
    <!-- Enlace al archivo de JavaScript externo -->
    <script src="../javascript/validacion_registro.js"></script>
</body>
</html>
