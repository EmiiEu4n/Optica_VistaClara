<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver categoria</title>
</head>

<body>
    <?php 
    include "menu_panel.php";
    ?>
    <div class="ver-producto-content main-content">
    <div class="titulo">
      <h3>CITA</h3>
    </div>
    <div class="content-info">
      <div class="content-registrar formulario">
        <form action="">

          <fieldset disabled="disabled">
            <legend>Información de cita</legend>
            <label for="">Fecha: <span>*</span></label>
            <input value="2024-11-8"><br><br>
            <label for="">Hora: <span>*</span></label>
            <select id="hora">
              <option value="#">10:00</option>
            </select><br><br>
            <label for="">Motivo: <span>*</span></label><br>
            <textarea name="" id="">Reparacion de unos lentes</textarea>
          </fieldset>
          <fieldset disabled="disabled">
            <legend>Información del cliente</legend>
            <label >Nombre:</label>
            <input value="Jose Miguel"><br><br>
            <label >Apellido:</label>
            <input value="Cauich Cocom"><br><br>
            <label >Teléfono:</label>
            <input value="9990236472"><br><br>
            <label >Preescripcion:</label><br>
            <textarea name="" id="">Lentes azules de graduacion -1.25 con astigmatismo</textarea>
          </fieldset>
          <div class="opciones-btn opciones-btn-registrar">
            <div style="width: 190px;" class="btn">
              <a href="./mostrar_citas.php">Regresar</a>
            </div>
          </div>

        </form>


    </div>
</body>

</html>