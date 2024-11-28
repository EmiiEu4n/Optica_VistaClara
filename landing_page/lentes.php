<div class="caja4">
<?php
      require "../php/conexion.php";

      $todos_datos = "SELECT * FROM productos ORDER BY  id_producto ASC";

      $resultado = mysqli_query($conectar, $todos_datos);

      while ($fila = mysqli_fetch_assoc($resultado)) {

      ?>
        <div class="cajaproducto">
          <a href="<?php echo $fila['img'] ?>" target="_blank"><img class="fotopromo" src="<?php echo $fila['img'] ?>" alt=""></a>
          <p class="tex1"> <?php echo $fila['nombre'] ?> </p>
          <p> <?php echo $fila['descripcion'] ?> </p><br>
          <!-- <a class="Btn3" href="ver_lente.php?id=<?php echo $fila['id_producto']; ?>">Ver Lente</a> -->
        </div>
        
      <?php
      }
      ?>
</div>