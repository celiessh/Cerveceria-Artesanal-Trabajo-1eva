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
          <td><a href="/home/update/<?= $cerveza->id?>">actualizar usuario</a></td>
          <td><a href="/home/delete/<?php echo $cerveza->$id?>">borrar usuario</a></td>
        </tr>        
        </table>
        <img src="<?php echo $cerveza->ruta;?>" alt="Imagen de cerveza.">
</body>
</html>