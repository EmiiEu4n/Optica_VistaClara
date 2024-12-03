<div class="contenedor4" id="aqui3">
  <br>
  <h1>Nuestros Productos</h1>
  <br>
  <div class="caja4-scroll">
    <?php
    require "../php/conexion.php";

    $todos_datos = "SELECT * FROM productos ORDER BY id_producto ASC";

    $resultado = mysqli_query($conectar, $todos_datos);

    while ($fila = mysqli_fetch_assoc($resultado)) {
    ?>
      <div class="cajaproducto">
        <img class="fotopromo" src="<?php echo $fila['img'] ?>" alt="Producto">
        <hr>
        <p style="text-align: center;" class="tex1"><?php echo $fila['nombre'] ?></p>
        <hr>
        <p style="text-align: justify;"><?php echo $fila['descripcion'] ?></p><br>
      </div>
    <?php
    }
    ?>
  </div>
</div>