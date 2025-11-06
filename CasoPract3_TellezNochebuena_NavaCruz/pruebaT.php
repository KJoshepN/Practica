<?php
include "conex.php";

$credenciales = ["localhost", "root", "admin", "Tienda"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);
    $precio = trim($_POST["precio"]);
    $descripcion = trim($_POST["descripcion"]);

    if (!empty($nombre) && !empty($precio)) {

        $query = "INSERT INTO productos (nombre, descripcion, precio)
                  VALUES ('$nombre', '$descripcion', '$precio')";
        insertar($credenciales, $query);
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
    }
}

$datos = seleccionar($credenciales, "SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style>

    </style>

    <h1>Productos existentes</h1>
    <table border>
		<thead>
			<tr>
				<th>ID</th>
				<th>Producto</th>
				<th>Descripcion</th>
                <th>Precio</th>
			</tr>
		</thead>
		<tbody>
		  <?php foreach($datos as $dato):?>
			<tr>
				<td><?php echo $dato[0] ?></td>
				<td><?php echo $dato[1] ?></td>
				<td><?php echo $dato[2] ?></td>
                <td><?php echo $dato[3] ?></td>
			</tr>
		  <?php endforeach ?>
		</tbody>
    </table>

    <h1>Nuevo Registro</h1>
    <form method="post">
        <label>Nombre</label>
        <input name="nombre"><br>
        <label>Precio</label>
        <input name="precio" type="number" step="0.01"><br>
        <label>Descripción</label>
        <input name="descripcion"><br>
        <input type="submit" value="Agregar nuevo">
    </form>
    <form action="cerrarS.php" method="post">
        <input type="submit" value="Cerrar Sesion">
    </form>
  </body>
</html>