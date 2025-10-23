<?php
session_start();

$usuarioValido = "kevin";
$claveValida = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['user']);
    $clave = trim($_POST['password']);

    if ($usuario === $usuarioValido && $clave === $claveValida) {
        $_SESSION['usuario'] = $usuario;
        setcookie("LOGEADO", $usuario, time() + 50, "/");
        header("Location: inicioPract2.php");
        exit();
    } else {
        header("Location: errorPract2.php");
        exit();
    }
}


if (isset($_SESSION['usuario'])) {
    header("Location: inicioPract2.php");
    exit();
}

if (isset($_COOKIE['LOGEADO'])) {
    $cookieUser = $_COOKIE['LOGEADO'];

    if ($cookieUser === $usuarioValido) {
        $_SESSION['usuario'] = $cookieUser;
        // Renueva cookie
        setcookie("LOGEADO", $cookieUser, time() + 30, "/");
        header("Location: inicioPract2.php");
        exit();
    } else {
        setcookie("LOGEADO", "", time() - 50, "/");
    }
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
			background: #020024;
			background: linear-gradient(90deg,rgba(2, 0, 36, 1) 6%, rgba(68, 68, 189, 1) 34%, rgba(255, 106, 0, 1) 100%);
		}
		form{
			padding: 50px;
			text-align: center;
			margin-top: 150px;
			font-size: 18px;
		}

		label{
			display: inline-block;
			margin-bottom: 1px;
			width: 100px;
			text-align: left;
			font-family: cursive;
		}
		.lab{
			padding-top: 20px;
			display: block;
			margin-left: 575px;
			text-align: center;
			font-size: 21px;
			color: ghostwhite;
		}
		.usp{
			text-align: center;
			padding-block: 3px;
		}
		.boton{
			padding-block: 5px;
			padding-inline: 10px;
			font-size: 15px;
			font-family: cursive;
		}
		.chbx{
			font-family: initial;
			font-size: 15px;
			margin-left: 25px;
		}
	</style>
	<form method="POST">
		<label class="lab">Usuario</label>
		<input class="usp" name="user"><br><br>
		<label class="lab">Contraseña</label>
		<input class="usp" type="password" name="password"><br><br>
		<input class="chbx" type="checkbox">
		<label class="chbx">Recuerdame</label><br><br>
		<input class="boton" type="submit" value="Ingresar">
	</form><br>
</body>
</html>