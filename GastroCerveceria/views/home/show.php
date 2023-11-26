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
        <th>nombre</th><th>tipo</th><th>graduacion alcoholica</th><th>pais</th><th>precio</th>
        <?php //foreach($users as $user){ ?>
        <tr>
          <td><?php echo $cerveza->nombre;?></td>
          <td><?= $cerveza->tipo;?></td>
          <td><?= $cerveza->graduacionAlcoholica;?></td>
          <td><?= $cerveza->pais;?></td>
          <td><?= $cerveza->precio;?></td>
          <!--<td><a href="/user/show/<?php //echo $user->id?>">Ver usuario</a></td>-->
          <td><a href="/?update/<?= $cerveza->identificador?>">actualizar usuario</a></td>
          <td><a href="/?delete/<?php echo $cerveza->identificador?>" onclick="return confirm('¿Esta seguro que desea borrar esta cerveza?');">borrar usuario</a></td>
        </tr>        
        </table>
        <img src="<?php echo $cerveza->ruta;?>" alt="Imagen de cerveza.">
</body>
</html>