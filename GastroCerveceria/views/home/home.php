<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>    
    <link href="public/css/bar.css" rel="stylesheet">
    <link href="public/css/mosaico.css" rel="stylesheet">
</head>
<body>
    <?php //echo getcwd();//public\pictures
     require "views/common/bar.php";?>

     <div id="mosaico">
        <?php $contador=0;
		foreach($cervezas as $cerveza){ ?>
			<?php if($contador%3==0){if($contador==0){echo "<div>";}else{echo "</div><div>";}}?>
				<a href="/home/show/<?php echo $cerveza->identificador?>" class="cuadro">
					<div style="background-repeat:no-repeat;background-size:contain;background-image:url(<?php echo $cerveza->ruta?>);">
						<p><!--No me dejo poner background-repeat y background size, en el mosaico.css-->
							<?php //Tostada , Rubia , De trigo, Negra
							echo $cerveza->nombre . " ";
							echo $cerveza->tipo. "; ";
							echo $cerveza->graduacionAlcoholica. "º De ";
							echo $cerveza->pais. " a ";
							echo $cerveza->precio.".";
							?>
						</p>
					</div>
				</a>
			<?php $contador++;?>	
        <?php }?>
		<!--<a href="C:/xampp/htdocs/Cerveceria Artesanal Trabajo 1eva/GastroCerveceria/views/home/create.php">a</a>-->
    </div>
</body>
</html>