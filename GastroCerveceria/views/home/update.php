<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="public/css/bar.css" rel="stylesheet">
    <title>GastroCerveceria</title>

</head>
<body>
  <!--
    $cerveza->nombre
    $cerveza->tipo
    $cerveza->graduacionAlcoholica
    $cerveza->pais
    $cerveza->precio
    $cerveza->ruta
  -->
  <?php require "views/common/bar.php";?>
        <table border='3px'><!--No mostrar nunca contraseñas ni otras cosas-->
        <th>nombre</th><th>apellido</th><th>email</th><th>fecha nacimiento</th>
        <?php //foreach($users as $user){ ?>
        <tr>
          <td><?php echo $cerveza->nombre;?></td>
          <td><?= $cerveza->tipo;?></td>
          <td><?= $cerveza->graduacionAlcoholica;?></td>
          <td><?= $cerveza->pais;?></td>
          <td><?= $cerveza->precio;?></td>
          <!--<td><a href="/user/show/<?php //echo $user->id?>">Ver usuario</a></td>-->
          <td><a href="/?delete/<?php echo $cerveza->identificador?>" onclick="return confirm('¿Esta seguro de que desea borrarlo?');">borrar usuario</a></td>
        </tr>        
        </table>
        <img src="<?php echo $cerveza->ruta;?>" alt="Imagen de cerveza."><br>


        
        <form enctype="multipart/form-data" action="/?save/<?php echo $cerveza->identificador?>" method="post"><!--/home/save-->
    <label for="numbre">Nombre:</label>
    <input type="text" name="nombre" id="numbre"  value="<?php echo $cerveza->nombre?>">
    <br>
    <label for="tipos">Tipo: <?= $cerveza->tipo;?></label>
    <select name="tipo" id="tipos">
        <option value="Rubia">Rubia</option>
        <option value="Negra">Negra</option>
        <option value="De Trigo">De Trigo</option>
        <option value="Tostada">Tostada</option>
    </select>
    <br>
    <label for="grad">Graduación Alcoholica:</label>
    <input type="number" value="<?= $cerveza->graduacionAlcoholica;?>" name="graduacionAlcoholica" min="1" max="50" id="graf">
    <br>
    <label for="paix">Pais:</label>
    <input type="text" value="<?= $cerveza->pais;?>" name="pais" id="paix" required>
    <br>
    <label for="prex">Precio:</label>
    <input type="number" value="<?= $cerveza->precio;?>" name="precio" id="prex" min="1" max="1000">
    <br>
    <label for="subir">Imagen:</label>
    <input type="file" name="ruta" id="subir" accept="image/png, image/jpeg">
    <br><!--
    <label for="resume">Resumen:</label>
    <input type="file" name="resumen" id="resume" accept=".docx, .pdf">
    <br>-->
    <input type="submit" name="submit" value="envuar">
</form>



</body>
</html>