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
  include "menu_panel.php";
  require "../php/conexion.php";
  include "../php/notificaciones.php";

  
  //Notificaciones
  if (isset($_SESSION["icon"])) {
   notify();
  }
  //get de origen
  $origen = isset($_GET['origen']) ? $_GET['origen'] : "";
  //prepara los datos
  $id = $_GET['id'];
  $horas = [
    '10:00:00' => '10:00 AM',
    '10:30:00' => '10:30 AM',
    '11:00:00' => '11:00 AM',
    '11:30:00' => '11:30 AM',
    '12:00:00' => '12:00 PM',
    '12:30:00' => '12:30 PM',
    '13:00:00' => '01:00 PM',
    '13:30:00' => '01:30 PM',
    '14:00:00' => '02:00 PM',
    '14:30:00' => '02:30 PM',
    '15:00:00' => '03:00 PM',
    '15:30:00' => '03:30 PM',
    '16:00:00' => '04:00 PM',
    '16:30:00' => '04:30 PM',
    '17:00:00' => '05:00 PM',
    // Agrega más horas si es necesario
  ];

  $cita = "SELECT ci.id_cita, cl.id_cliente, cl.nombres, cl.apellidos, cl.correo, cl.telefono, cl.preescripcion, ci.fecha_cita, ci.hora, ci.estado, ci.motivo
  FROM citas ci
  INNER JOIN clientes cl ON ci.id_cliente = cl.id_cliente
  WHERE ci.id_cita = '$id'";
  // consulta
  $query = mysqli_query($conectar, $cita);

  $info = $query->fetch_array();
  ?>
  <!-- Manteniendo el menú si es necesario -->
  <div class="nuevo-usuario main-content">
    <div class="titulo">
      <h3>AGENDAR CITA</h3>
    </div>
    <div class="content-info">
      <div class="content-registrar formulario">
        <form action="../php/update_cita.php" method="POST">

          <fieldset>
            <legend>Información de cita</legend>
            <!-- Fecha -->
            <label for="">Fecha: <span>*</span></label>
            <input value="<?php echo $info['fecha_cita'] ?>" required class="flatpickr" id="fecha" name="fecha" min="" max="" type="date"><br><br>
            <!-- Hora -->
            <label for="">Horario: <span>*</span></label>
            <select style="width: 100%;" required id="hora" name="hora" disabled>
              <option value="">Selecciona la hora de la cita</option>

              <?php foreach ($horas as $valor => $texto): ?>
                <option value="<?php echo $valor; ?>" <?php echo ($info['hora'] == $valor) ? 'selected' : ''; ?>>
                  <?php echo $texto; ?>
                </option>
              <?php endforeach; ?>

            </select><br><br>

            <!-- Motivo -->
            <label for="">Motivo: <span>*</span></label><br>
            <textarea class="validar-espacios" style="width: 100%;" required name="motivo" id="input-motivo"><?php echo $info['motivo'] ?></textarea>

            <input type="hidden" name="id_cita" value="<?php echo $id ?>">
          </fieldset>

          <fieldset disabled="disable">
            <legend>Información del cliente</legend>
            <label>Nombre:</label>
            <input disabled value="<?php echo $info['nombres'] . " " . $info['apellidos'] ?>">
          </fieldset>


          <!-- Botones -->
          <div class="opciones-btn opciones-btn-registrar">
            <div style="width: 190px;" class="btn">
              <a href="<?php echo ($origen == 'citas') ? './mostrar_ver.php' : './ver_cita.php?origen=citas&id='. $id ?>">Regresar</a>
            </div>
            <button style="width: 190px;" class="btn-form" type="submit">Agendar</button>
          </div>

        </form>
      </div>
    </div>
  </div>

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
      color: #ff4040;
      /* Cambia el color a rojo */
    }
  </style>
</body>

</html>