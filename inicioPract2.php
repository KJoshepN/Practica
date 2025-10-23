<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cerrar'])) {
    session_destroy();
    setcookie("LOGEADO", "", time() - 50, "/");
    header("Location: casoPract2.php");
    exit();
}


if (!isset($_SESSION['usuario'])) {
    header("Location: casoPract2.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
	</title>
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
	</style>
	<label>BIENVENIDO</label><br>
	<form method="POST">
	<input type="submit" name="cerrar" value="CERRAR SESION">
	</form>
</body>
</html>