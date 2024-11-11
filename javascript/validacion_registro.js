
// Configuración del modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() { modal.style.display = "block"; }
span.onclick = function() { modal.style.display = "none"; }
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Validación en tiempo real
document.getElementById("nombre").addEventListener("input", function() {
  const nombre = document.getElementById("nombre");
  const nombreError = document.getElementById("nombre-error");

  if (!nombre.checkValidity()) {
    nombreError.style.display = "block";
  } else {
    nombreError.style.display = "none";
  }
});

document.getElementById("apellido").addEventListener("input", function() {
  const apellido = document.getElementById("apellido");
  const apellidoError = document.getElementById("apellido-error");

  if (!apellido.checkValidity()) {
    apellidoError.style.display = "block";
  } else {
    apellidoError.style.display = "none";
  }
});

document.getElementById("direccion").addEventListener("input", function() {
  const direccion = document.getElementById("direccion");
  const direccionError = document.getElementById("direccion-error");

  if (!direccion.checkValidity()) {
    direccionError.style.display = "block";
  } else {
    direccionError.style.display = "none";
  }
});

document.getElementById("telefono").addEventListener("input", function() {
  const telefono = document.getElementById("telefono");
  const telefonoError = document.getElementById("telefono-error");

  if (!telefono.checkValidity()) {
    telefonoError.style.display = "block";
  } else {
    telefonoError.style.display = "none";
  }
});

document.getElementById("email").addEventListener("input", function() {
  const email = document.getElementById("email");
  const emailError = document.getElementById("email-error");

  if (!email.checkValidity()) {
    emailError.style.display = "block";
  } else {
    emailError.style.display = "none";
  }
});

document.getElementById("password").addEventListener("input", function() {
  const password = document.getElementById("password");
  const passwordLengthError = document.getElementById("password-length-error");

  if (password.value.length < 8) {
    passwordLengthError.style.display = "block";
  } else {
    passwordLengthError.style.display = "none";
  }
});

document.getElementById("confirmar-password").addEventListener("input", function() {
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmar-password").value;
  const passwordError = document.getElementById("password-error");

  if (password !== confirmPassword) {
    passwordError.style.display = "block";
  } else {
    passwordError.style.display = "none";
  }
});
