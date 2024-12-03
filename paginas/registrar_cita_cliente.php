<?php
session_start();
if (!isset($_SESSION['id_cliente'])) {
  header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendar cita</title>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="preload" href="../css/normalize.css" as="style">
  <link rel="preload" href="../css/style_clientes.css" as="style">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/style_clientes.css">
</head>

<body>
  <?php
  require "../php/conexion.php";
  include "../php/notificaciones.php";
  $id_cliente = $_SESSION['id_cliente'];
  if (isset($_SESSION["icon"])) {
    notify();
  }

  $sql = "SELECT id_cliente, nombres, apellidos FROM clientes";
  $result = $conectar->query($sql);
  $clientes = [];

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $clientes[] = [
        'id' => $row['id_cliente'],
        'nombre' => $row['nombres'] . " " . $row['apellidos'],
      ];
    }

    $conectar->close();
    $clientes_json = json_encode($clientes);
  } else {
    echo "No se encontraron resultados";
  }
  ?>
  <div class="nuevo-usuario main-content">
    <div class="titulo">
      <h3>AGENDAR CITA</h3>
    </div>
    <div class="content-info">
      <div class="content-registrar formulario">
        <form action="../php/create_cita.php?origen=clientes" method="POST">
          <label for="">Los campos con <span>*</span> son obligatorios.</label><br>
          <fieldset>
            <legend>Información de cita</legend>

            <label for="">Fecha: <span>*</span></label>
            <input required class="flatpickr" id="fecha" name="fecha" min="" max="" type="date"><br><br>

            <label for="">Horario: <span>*</span></label>
            <select style="width: 100%;" required id="hora" name="hora" disabled>
              <option value="">Selecciona la hora de la cita</option>
              <!-- Horarios -->
              <option value="10:00:00">10:00 AM</option>
              <option value="10:30:00">10:30 AM</option>
              <option value="11:00:00">11:00 AM</option>
              <option value="11:30:00">11:30 AM</option>
              <option value="12:00:00">12:00 PM</option>
              <option value="12:30:00">12:30 PM</option>
              <option value="13:00:00">01:00 PM</option>
              <option value="13:30:00">01:30 PM</option>
              <option value="14:00:00">02:00 PM</option>
              <option value="14:30:00">02:30 PM</option>
              <option value="15:00:00">03:00 PM</option>
              <option value="15:30:00">03:30 PM</option>
              <option value="16:00:00">04:00 PM</option>
              <option value="16:30:00">04:30 PM</option>
              <option value="17:00:00">05:00 PM</option>
              <option value="20:00:00">08:00 PM</option>
              <option value="20:30:00">08:30 PM</option>
              <option value="21:00:00">09:00 PM</option>
              <option value="21:30:00">09:30 PM</option>
              <option value="20:00:00">12:00 PM</option>
            </select><br><br>
            </select><br><br>

            <label for="">Motivo: <span>*</span></label><br>
            <textarea maxlength="150" class="validar-espacios" style="width: 100%;" required name="motivo" id="input-motivo"></textarea>
          </fieldset>

          <input type="hidden" name="id-cliente" value="<?php echo $id_cliente ?>">

          <div class="opciones-btn opciones-btn-registrar">
            <div style="width: 190px;" class="btn">
              <a href="./portal_cliente.php">Regresar</a>
            </div>
            <button style="width: 190px;" class="btn-form" type="submit">Agendar</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Asegurarse de que el código JavaScript no se toque -->
  <!-- JavaScript -->
  <script>
    //javascript de fecha y hora
    // Función para obtener los días festivos obligatorios de México (año dinámico)
    function obtenerDiasFestivos(year) {
      return [
        new Date(year, 0, 1), // Año Nuevo (1 de enero)
        obtenerPrimerLunesDeFebrero(year), // Día de la Constitución (primer lunes de febrero)
        obtenerTercerLunesDeMarzo(year), // Natalicio de Benito Juárez (tercer lunes de marzo)
        new Date(year, 4, 1), // Día del Trabajo (1 de mayo)
        new Date(year, 8, 16), // Día de la Independencia (16 de septiembre)
        obtenerTercerLunesDeNoviembre(year), // Revolución Mexicana (tercer lunes de noviembre)
        new Date(year, 11, 25) // Navidad (25 de diciembre)
      ];
    }

    // Función para obtener el primer lunes de febrero
    function obtenerPrimerLunesDeFebrero(year) {
      let date = new Date(year, 1, 1); // 1 de febrero
      while (date.getDay() !== 1) { // 1 es lunes
        date.setDate(date.getDate() + 1);
      }
      return date;
    }

    // Función para obtener el tercer lunes de marzo
    function obtenerTercerLunesDeMarzo(year) {
      let date = new Date(year, 2, 1); // 1 de marzo
      let count = 0;
      while (count < 3) {
        if (date.getDay() === 1) { // 1 es lunes
          count++;
        }
        date.setDate(date.getDate() + 1);
      }
      return new Date(year, 2, date.getDate() - 1);
    }

    // Función para obtener el tercer lunes de noviembre
    function obtenerTercerLunesDeNoviembre(year) {
      let date = new Date(year, 10, 1); // 1 de noviembre
      let count = 0;
      while (count < 3) {
        if (date.getDay() === 1) { // 1 es lunes
          count++;
        }
        date.setDate(date.getDate() + 1);
      }
      return new Date(year, 10, date.getDate() - 1);
    }

    // Función para verificar si una fecha es domingo o día festivo
    function esDiaDeshabilitado(date, festivos) {
      const esDomingo = date.getDay() === 0; // Verifica si es domingo
      const esFestivo = festivos.some(
        festivo =>
        festivo.getDate() === date.getDate() &&
        festivo.getMonth() === date.getMonth() &&
        festivo.getFullYear() === date.getFullYear()
      );
      return esDomingo || esFestivo;
    }

    document.addEventListener('DOMContentLoaded', function() {
      fetch('../php/consulta_fechas.php')
        .then(response => response.json())
        .then(data => {
          // console.log('Fechas llenas recibidas:', data.fechasLlenas); // Depuración

          const fechasLlenas = data.fechasLlenas.map(fecha => new Date(fecha + 'T00:00:00'));

          // console.log('Fechas llenas convertidas a Date:', fechasLlenas); // Depuración

          // Configuración de Flatpickr
          flatpickr("#fecha", {
            disable: [
              function(date) {
                const year = date.getFullYear();
                const diasFestivos = obtenerDiasFestivos(year); // Obtener días festivos dinámicamente
                return esDiaDeshabilitado(date, diasFestivos) || fechasLlenas.some(
                  fechaLlena => fechaLlena.getTime() === date.setHours(0, 0, 0, 0)
                ); // Deshabilitar domingos, festivos y fechas llenas
              }
            ],
            minDate: "today",
            maxDate: new Date().fp_incr(60), // Próximos 60 días
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
              // Aquí puedes manejar la fecha seleccionada
            },
            onDayCreate: function(dObj, dStr, fp, dayElem) {
              const date = new Date(dayElem.dateObj);
              date.setHours(0, 0, 0, 0);
              if (fechasLlenas.some(fechaLlena => fechaLlena.getTime() === date.getTime())) {
                dayElem.style.backgroundColor = "grey";
                dayElem.style.color = "white";
              }

            }
          });
        })
        .catch(error => console.error('Error al obtener las fechas:', error));
    });



    // Deshabilitar el selector de hora hasta que se seleccione una fecha
    document.addEventListener('DOMContentLoaded', function() {
      const fechaInput = document.getElementById('fecha');
      const horaSelect = document.getElementById('hora');

      fechaInput.addEventListener('change', function() {
        // Habilitar el selector de hora y restablecer el estado de las opciones
        horaSelect.disabled = true; // Mantenerlo deshabilitado inicialmente
        horaSelect.querySelectorAll('option').forEach(option => {
          option.disabled = false; // Habilitar todas las opciones
          option.classList.remove('option-disabled'); // Remover clase de estilo
        });

        // Restablecer la selección de la hora
        horaSelect.value = ""; // Restablecer la selección a la opción predeterminada

        if (fechaInput.value) {
          const fechaSeleccionada = new Date(fechaInput.value + "T00:00:00");
          const hoy = new Date();
          console.log(fechaSeleccionada);

          // Filtrar las horas si la fecha seleccionada es hoy
          if (fechaSeleccionada.toDateString() === hoy.toDateString()) {
            const horaActualEnMinutos = hoy.getHours() * 60 + hoy.getMinutes();
            console.log('Hora actual en minutos:', horaActualEnMinutos);

            horaSelect.querySelectorAll('option').forEach(option => {
              const [hora, minuto] = option.value.split(':').map(Number);
              const valorHoraEnMinutos = hora * 60 + minuto;
              console.log('valorHoraEnMinutos:', valorHoraEnMinutos);

              if (valorHoraEnMinutos - horaActualEnMinutos < 30) { // Deshabilitar si faltan menos de 30 minutos
                option.disabled = true;
                option.classList.add('option-disabled');
              }
            });
          }

          // Realiza la solicitud a PHP para obtener los horarios
          fetch('../php/consulta_horarios.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                fecha: fechaInput.value
              }),
            })
            .then(response => response.json())
            .then(data => {
              const horasADeshabilitar = [];

              if (data.length < 15) {
                data.forEach(horario => {
                  horasADeshabilitar.push(horario.hora);
                });

                horaSelect.disabled = false;

                horasADeshabilitar.forEach(hora => {
                  const optionToDisable = horaSelect.querySelector(`option[value="${hora}"]`);
                  if (optionToDisable) {
                    optionToDisable.disabled = true;
                    optionToDisable.classList.add('option-disabled');
                  }
                });

              }
              console.log(horasADeshabilitar);
            })
            .catch(error => console.error('Error:', error));
        } else {
          horaSelect.disabled = true;
        }
      });

      document.querySelector('form').addEventListener('submit', function(e) {
        if (!fechaInput.value || !horaSelect.value) {
          e.preventDefault();
          alert('Por favor selecciona una fecha y una hora.');
        }
      });
    });
    // Verificación de campos
    // Evitar el envío del formulario si los campos son inválidos
    document.querySelector('form').addEventListener('submit', function(e) {
      if (!fechaInput.value || !horaSelect.value) {
        e.preventDefault();
        alert('Por favor selecciona una fecha y una hora.');
      }
    });





    //javascript de clientes
    // Datos simulados de clientes (estos deberían venir de la base de datos)
    const clientes = <?php echo $clientes_json; ?>;

    // // Guardar y restaurar el ID del cliente usando localStorage
    // const idClienteInput = document.getElementById('id-cliente');

    // // Intentar restaurar el valor del ID si está almacenado
    // if (localStorage.getItem('id-cliente')) {
    //   idClienteInput.value = localStorage.getItem('id-cliente');
    // }

    // Obtener elementos del DOM
    const inputBuscar = document.getElementById('buscar-cliente');
    const listaSugerencias = document.getElementById('sugerencias-clientes');
    const inputIdCliente = document.getElementById('id-cliente'); // Campo oculto para el ID
    const inputMotivo = document.getElementById('input-motivo');
    // Limpiar el campo de nombre al cargar la página
    window.addEventListener('load', function() {
      inputBuscar.value = ''; // Limpiar el campo de nombre
    });
    // Limpiar el campo de motivo al cargar la página
    window.addEventListener('load', function() {
      inputMotivo.value = ''; // Limpiar el campo de nombre
    });

    // Función para filtrar las coincidencias
    inputBuscar.addEventListener('input', () => {
      const query = inputBuscar.value.toLowerCase();
      listaSugerencias.innerHTML = ''; // Limpiar la lista de sugerencias

      if (query) {
        // Filtrar las coincidencias basadas en la entrada del usuario
        const coincidencias = clientes.filter(cliente => cliente.nombre.toLowerCase().includes(query));

        // Mostrar las coincidencias en la lista
        coincidencias.forEach(coincidencia => {
          const item = document.createElement('li');
          item.textContent = coincidencia.nombre;
          item.addEventListener('click', () => {
            // Asignar el valor seleccionado al input de búsqueda
            inputBuscar.value = coincidencia.nombre;
            // Asignar el ID del cliente al campo oculto
            inputIdCliente.value = coincidencia.id;
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

    // Verificación de campos
    document.querySelector('form').addEventListener('submit', function(event) {
      let idCliente = document.getElementById('id-cliente').value;
      let errorMsg = document.getElementById('error-msg');

      // Verifica si el campo id-cliente está vacío
      if (!idCliente) {
        // Si el id del cliente no está asignado, muestra el mensaje de error y cancela el envío
        errorMsg.style.display = 'block';
        event.preventDefault(); // Evita el envío del formulario
      } else {
        // Si el id-cliente tiene valor, se permite el envío del formulario
        errorMsg.style.display = 'none';
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

    .option-disabled {
      color: #ff7676;
      /* Cambia el color a rojo */
    }
  </style>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../javascript/notificaciones.js" defer></script>
  <script src="../javascript/validacion.js" defer></script>
</body>

</html>