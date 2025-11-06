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
        header("Location: pruebaT.php");
        exit();
    } else {
        header("Location: errorPract2.php");
        exit();
    }
}


if (isset($_SESSION['usuario'])) {
    header("Location: pruebaT.php");
    exit();
}

if (isset($_COOKIE['LOGEADO'])) {
    $cookieUser = $_COOKIE['LOGEADO'];

    if ($cookieUser === $usuarioValido) {
        $_SESSION['usuario'] = $cookieUser;
        setcookie("LOGEADO", $cookieUser, time() + 30, "/");
        header("Location: pruebaT.php");
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
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 300% 300%;
            animation: gradient 15s ease infinite;
            height: 75vh;
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
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
	</style>
	<form method="POST">
		<label class="lab">Usuario</label>
		<input class="usp" name="user"><br><br>
		<label class="lab">Contraseña</label>
		<input class="usp" type="password" name="password"><br><br>
		<input class="chbx" type="checkbox" name="recuerda">
		<label class="chbx">Recuerdame</label><br><br>
		<input class="boton" type="submit" value="Ingresar">
	</form><br>
        <div class="d-flex flex-column justify-content-center w-100 h-100">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="fw-light text-white m-0"></h1>
            <div class="btn-group my-5">
                <a href="https://codepen.io/P1N2O/details/pyBNzX" target="_blank" class="btn btn-outline-light" aria-current="page"><i class="fas fa-circle-info me-2"></i></a>
                <a href="https://codepen.io/P1N2O/full/pyBNzX" target="_blank" class="btn btn-outline-light"><i class="fas fa-expand ms-2"></i></a>
            </div>
        </div>
        </div>
    </div>
</body>
</html>