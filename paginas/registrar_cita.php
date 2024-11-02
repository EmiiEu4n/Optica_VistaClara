<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendar cita</title>
  <link rel="stylesheet" href="../css/agendar.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
  <?php
  include "menu_panel.php" ?>
  <!-- Manteniendo el menú si es necesario -->
  <div class="nuevo-usuario main-content">
    <div class="titulo">
      <h3>AGENDAR CITA</h3>
    </div>
    <div class="content-info">
      <div class="content-registrar formulario">
        <form action="">

          <fieldset>
            <legend>Información de cita</legend>
            <label for="">Fecha: <span>*</span></label>
            <input class="flatpickr" id="fecha" name="fecha" min="" max="" type="date"><br><br>
            <label for="">Hora: <span>*</span></label>
            <select id="hora" disabled>
              <option value="">Selecciona la hora de la cita</option>
              <option value="10:00">10:00 AM</option>
              <option value="11:00">11:00 AM</option>
              <option value="12:00">12:00 PM</option>
              <option value="01:00">01:00 PM</option>
              <option value="02:00">02:00 PM</option>
              <option value="03:00">03:00 PM</option>
              <option value="04:00">04:00 PM</option>
              <option value="05:00">05:00 PM</option>
            </select><br><br>
            <label for="">Motivo: <span>*</span></label><br>
            <textarea name="" id=""></textarea>
          </fieldset>

          <fieldset>
            <legend>Información del cliente</legend>
            <label for="buscar-cliente">Nombre:</label>
            <input type="text" id="buscar-cliente" placeholder="Nombre del cliente Ej. Emiliano Euan Puc">

            <!-- Lista de sugerencias para mostrar coincidencias -->
            <ul id="sugerencias-clientes" class="sugerencias" style="display: none;">
              <!-- Aquí se agregarán las opciones filtradas -->
            </ul>
          </fieldset>
          <div class="opciones-btn opciones-btn-registrar">
            <div style="width: 190px;" class="btn">
              <a href="./mostrar_citas.php">Regresar</a>
            </div>
            <button style="width: 190px;" class="btn-form" type="submit">Agendar cita</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    //javascript de fecha y hora
    flatpickr("#fecha", {
      onDayCreate: function(dObj, dStr, fp, dayElem) {
        // Fecha específica que deseas resaltar: 5 de diciembre de 2024
        const highlightDate = new Date(2024, 11, 5); // Mes es 11 porque en JS los meses empiezan desde 0

        // Comparar la fecha del día actual del calendario con la fecha específica
        if (
          dayElem.dateObj.getFullYear() === highlightDate.getFullYear() &&
          dayElem.dateObj.getMonth() === highlightDate.getMonth() &&
          dayElem.dateObj.getDate() === highlightDate.getDate()
        ) {
          // Añadir clase personalizada para pintar esa fecha específica
          dayElem.classList.add("highlight-day");
        }
      },
      // Configuración para limitar fechas
      minDate: "today",
      maxDate: new Date().fp_incr(60) // Próximos 60 días
    });


    // Deshabilitar el selector de hora hasta que se seleccione una fecha
    const fechaInput = document.getElementById('fecha');
    const horaSelect = document.getElementById('hora');

    fechaInput.addEventListener('change', function() {
      if (fechaInput.value) {
        // Si hay una fecha seleccionada, habilitar el selector de hora
        horaSelect.disabled = false;
      } else {
        // Si no hay fecha seleccionada, mantenerlo deshabilitado
        horaSelect.disabled = true;
      }
    });
    // Deshabilitar la opción con valor "03:00"
    const optionToDisable = horaSelect.querySelector('option[value="03:00"]');
    optionToDisable.disabled = true;


    //javascript de clientes
    // Datos simulados de clientes (estos deberían venir de la base de datos)
    const clientes = [
      "Alfi Avila",
      "Joel Cauich",
      "Gaspar Emiliano Euan Puc",
    ];

    // Obtener elementos del DOM
    const inputBuscar = document.getElementById('buscar-cliente');
    const listaSugerencias = document.getElementById('sugerencias-clientes');

    // Función para filtrar las coincidencias
    inputBuscar.addEventListener('input', () => {
      const query = inputBuscar.value.toLowerCase();
      listaSugerencias.innerHTML = ''; // Limpiar la lista de sugerencias

      if (query) {
        // Filtrar las coincidencias basadas en la entrada del usuario
        const coincidencias = clientes.filter(cliente => cliente.toLowerCase().includes(query));

        // Mostrar las coincidencias en la lista
        coincidencias.forEach(coincidencia => {
          const item = document.createElement('li');
          item.textContent = coincidencia;
          item.addEventListener('click', () => {
            // Asignar el valor seleccionado al input
            inputBuscar.value = coincidencia;
            listaSugerencias.style.display = 'none'; // Ocultar la lista después de seleccionar
          });
          listaSugerencias.appendChild(item);
        });

        // Mostrar la lista solo si hay coincidencias
        listaSugerencias.style.display = coincidencias.length ? 'block' : 'none';
      } else {
        listaSugerencias.style.display = 'none'; // Ocultar la lista si no hay entrada
      }
    });
  </script>


  <!-- Estilos para el calendario -->
  <style>
    .highlight-day {
      background-color: cornflowerblue;
      /* Color de fondo amarillo */
      border-radius: 50%;
      /* Hacerlo circular si lo prefieres */
      color: white;
      /* Cambiar el color del texto */

    }

    .disable {
      pointer-events: none;
    }

    .sugerencias {
      list-style: none;
      padding: 0;
      margin: 5px 0;
      border: 1px solid #ccc;
      max-height: 150px;
      overflow-y: auto;
    }

    .sugerencias li {
      padding: 8px;
      cursor: pointer;
      border-bottom: 1px solid #ddd;
    }

    .sugerencias li:hover {
      background-color: #f0f0f0;
    }
  </style>
</body>

</html>