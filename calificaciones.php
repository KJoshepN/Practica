<?php
	$alumnos = ["David","Joshep","Daniela","Samantha","Pablo","Fatima","Alejandra","Adrian","Jair","Sarai"];
	$calificaciones = ["0","1","2","3","4","5","6","7","8","9","10","NP"];
?>

<html>
<head>
	<title></title>
</head>
<body>
	<h1>Mis Alumnos</h1>
	<form method="POST" action="estadisticas.php">
		<table border="">
			<tr>
				<th>Nombre</th>
				<th>Calificación</th>
			</tr>
			<?php foreach ($alumnos as $alumno):?>
			<tr>
				<td>
					<label><?php echo $alumno?></label>
				</td>
				<td>
					<select name="cbo<?php echo $alumno?>">
						<?php foreach ($calificaciones as $calif): ?>
						<option><?php echo $calif ?></option>
						<?php endforeach ?>
					</select>
				</td>
			<?php endforeach ?>
			</tr>
		</table>
		<input type="submit">
	</form>
</body>
</html>