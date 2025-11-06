<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<style>
		body{
			background: #ffffff;
			background: radial-gradient(circle,rgba(255, 255, 255, 1) 0%, rgba(130, 18, 52, 1) 100%);
		}
		label{
			display: block;
    		text-align: center;
    		margin-top: 150px;
    		font-size: 80px;
    		font-weight: bold;
		}
		form{
			padding: 50px;
			text-align: center;
			margin-top: 120px;
			font-size: 18px;
		}	
		.desc{
			font-size: 22px;
			margin-top: 20px;
			 
		}
	</style>
	<label>ERROR</label><br>
	<label class="desc">Usuario o Contraseña Incorrecta</label>
	<form method="GET" action="tiendaLog.php">
	<input type="submit" value="REGRESAR">
	</form>
</body>
</html>