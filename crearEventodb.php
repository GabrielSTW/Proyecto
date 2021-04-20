<?php

require("conexion.php");

echo $descripcion = $_POST['descripcion'];

$sentencia = $mbd -> prepare("INSERT INTO eventos(descripcion) VALUES (?)");
$sentencia -> bindParam(1, $descripcion);
$sentencia -> execute();

header('Location: index.php');

 ?>
