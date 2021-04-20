<?php
require("conexion.php");

$id = $_POST['id'];
$pasteleria = $_POST['pasteleria'];
$articulo = $_POST['articulo'];
$evento = $_POST['eventosID'];


$sentencia = $mbd->prepare("UPDATE reposteria SET pasteleria=?, descripcion=?, evento_id=? WHERE id=?");
$sentencia->bindParam(1, $pasteleria);
$sentencia->bindParam(2, $articulo);
$sentencia->bindParam(3, $evento);
$sentencia->bindParam(4, $id);
$sentencia->execute();

header('Location: mostrarRegistros.php');

 ?>
