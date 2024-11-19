function notificacion(title, text, icon) {
  Swal.fire({
    title: title,
    text: text,
    icon: icon,
    confirmButtonText: "OK",
  });
}

//Cancelar
document.addEventListener("DOMContentLoaded", () => {
  const cancelarEnlace = document.querySelector(".cancelar-cita");

  cancelarEnlace.addEventListener("click", function (event) {
    event.preventDefault(); // Prevenir la acción por defecto del enlace

    Swal.fire({
      title: "¿Estás seguro?",
      text: "Se va cancelar la cita y el horario pasara a disponibilidad, ¡No podrás revertir esto!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#8c8c8c",
      cancelButtonColor: "#151e2d",
      confirmButtonText: "Sí, cancelar cita",
      cancelButtonText: "No, mantener",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = cancelarEnlace.href; // Redirigir si el usuario confirma
      }
    });
  });
});

//Confirmar cita
document.addEventListener("DOMContentLoaded", () => {
  const cancelarEnlace = document.querySelector(".confirmar-cita");

  cancelarEnlace.addEventListener("click", function (event) {
    event.preventDefault(); // Prevenir la acción por defecto del enlace

    Swal.fire({
      title: "¿Estás seguro?",
      text: "Se va confirmar la cita, ¡No podrás revertir esto!",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#8c8c8c",
      cancelButtonColor: "#151e2d",
      confirmButtonText: "Sí, confirmar cita",
      cancelButtonText: "No, cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = cancelarEnlace.href; // Redirigir si el usuario confirma
      }
    });
  });
});

//Eliminar cita
document.addEventListener("DOMContentLoaded", () => {
  const cancelarEnlace = document.querySelector(".eliminar-cita");

  cancelarEnlace.addEventListener("click", function (event) {
    event.preventDefault(); // Prevenir la acción por defecto del enlace

    Swal.fire({
      title: "¿Estás seguro?",
      text: "¡No podrás revertir esto!",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#8c8c8c",
      cancelButtonColor: "#151e2d",
      confirmButtonText: "Sí, eliminar cita",
      cancelButtonText: "No, cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = cancelarEnlace.href; // Redirigir si el usuario confirma
      }
    });
  });
});
