<?php

	$alumnos = ["David","Joshep","Daniela","Samantha","Pablo","Fatima","Alejandra","Adrian", "Jair", "Sarai"];

	$total = 0;
	$totalA = 0;
	$promedio = 0;
	$mejorCalif = 0;
	$peorCalif = 10;
	$porcRep = 0;
	$porcAp = 0;
	$reprobados = 0;
	$aprobados = 0;
	$areaOp = [];
	$np = 0;

	foreach ($alumnos as $alumno) {
		$calif = $_POST["cbo".$alumno];
		if ($calif === "NP") {
			$np++;
			continue;
		}

		$calif = (float)$calif;
		$total = $total + $calif;
		$totalA = $totalA + 1;

		if ($calif >= 6) {
			$aprobados++;
		}else{
			$reprobados++;
			$areaOp[] = $alumno . " (" . $calif . ")";
		}
		

		if ($calif < $peorCalif) {
			$peorCalif = $calif;
		}

		if ($calif > $mejorCalif) {
		$mejorCalif = $calif;
		}
	}

	if ($total > 0) {
		$promedio = $total/$totalA;
		$porcAp = ($aprobados * 100)/ $totalA;
		$porcRep = ($reprobados * 100)/ $totalA;
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Estadísticas</title>
</head>
<body>
 	<h2>Resultados del grupo</h2>
   	<form method="POST" action="calificaciones.php">
   	<?php if ($total > 0): ?>
  	<table border="1px">
  	<tr>
  		<th>Aprovechamiento general</th>
  		<td><?php echo number_format($promedio, 2); ?></td>
  	</tr>
  	<tr>
  		<th>Alumnos aprobados</th>
  		<td><?php echo $aprobados; ?></td>
  	</tr>
  	<tr>
  		<th>Alumnos reprobados</th>
  		<td><?php echo $reprobados; ?></td>
  	</tr>
  	<tr>
  		<th>Porcentaje de aprobados</th>
  		<td><?php echo number_format($porcAp, 2); ?> %</td>
  	</tr>
  	<tr>
  		<th>Porcentaje de reprobados</th>
  		<td><?php echo number_format($porcRep, 2); ?> %</td>
  	</tr>
  	<tr>
  		<th>Peor Calificación</th>
  		<td><?php echo $peorCalif; ?></td>
  	</tr>
  	<tr>
  		<th>Mejor Calificación</th>
  		<td><?php echo $mejorCalif; ?></td>
  	</tr>
  	<tr>
  		<th>Alumnos con NP</th>
  		<td><?php echo $np; ?></td>
  	</tr>
  	</table>
    <?php else: ?>
    <p>No hay datos válidos (todos fueron NP).</p>
  	<?php endif; ?>

  	<?php if (count($areaOp) > 0): ?>
    <th>Alumnos en área de oportunidad:</th>
    <ul>
      <?php foreach ($areaOp as $alumno): ?>
        <li><?= $alumno ?></li>
      <?php endforeach; ?>
    </ul>
  	<?php endif; ?>

   	<input type="submit">
  	</form>
</body>
</html>