<?php
require("conexion.php");
$vid = $_GET['id'];


$sentencia = $mbd->prepare("DELETE FROM usuarios WHERE id=?");
$sentencia->bindParam(1, $vid);

$sentencia->execute();

header('Location:mostrarRegistros.php?mal=el');

 ?>
