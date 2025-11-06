<?php
session_start();
$_SESSION = [];
session_destroy();
setcookie("LOGEADO", "", time() - 3600, "/");
header("Location: tiendaLog.php");
exit();
?>