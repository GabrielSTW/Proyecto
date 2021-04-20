<?php
require("conexion.php");

$id = $_POST['id'];
$evento = $_POST['descripcion'];


$sentencia = $mbd->prepare("UPDATE eventos SET descripcion=? WHERE Id=?");
$sentencia->bindParam(1, $evento);
$sentencia->bindParam(2, $id);
$sentencia->execute();

header('Location: mostrarEventos.php');

 ?>
