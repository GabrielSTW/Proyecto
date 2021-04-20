<?php
require("conexion.php");
$vid = $_GET['id'];


$sentencia = $mbd->prepare("DELETE FROM reposteria WHERE Id=?");
$sentencia->bindParam(1, $vid);

$sentencia->execute();

header('Location:mostrarReposteria.php');

 ?>
