<?php
/*
echo $cerveza->nombre . " ";
echo $cerveza->tipo. "; ";
echo $cerveza->graduacionAlcoholica. "º De ";
echo $cerveza->pais. " a ";
echo $cerveza->precio.".";
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastroCervecería</title>
    <link href="public/css/bar.css" rel="stylesheet">
</head>
<body>
    <?php require "views/common/bar.php";?>

<h1>Añadir Cerveza</h1>

<!--llama al controlador-->
<form enctype="multipart/form-data" action="/?store" method="post">
    <label for="numbre">Nombre:</label>
    <input type="text" name="nombre" id="numbre">
    <br>
    <label for="tipos">Tipo:</label>
    <select name="tipo" id="tipos">
        <option value="Rubia">Rubia</option>
        <option value="Negra">Negra</option>
        <option value="De Trigo">De Trigo</option>
        <option value="Tostada">Tostada</option>
    </select>
    <br>
    <label for="grad">Graduación Alcoholica:</label>
    <input type="number" name="graduacionAlcoholica" min="1" max="50" id="graf">
    <br>
    <label for="paix">Pais:</label>
    <input type="text" name="pais" id="paix" required>
    <br>
    <label for="prex">Precio:</label>
    <input type="number" name="precio" id="prex" min="1" max="1000">
    <br>
    <label for="subir">Imagen:</label>
    <input type="file" name="ruta" id="subir" accept="image/png, image/jpeg">
    <br>
    <label for="resume">Resumen:</label>
    <input type="file" name="resumen" id="resume" accept=".docx, .pdf">
    <br>
    <input type="submit" name="submit" value="envuar">
</form>

<?php
    
?>
    
</body>
</html>