<?php

include("conexion.php");


$nombre = $_POST['reposteria'];
$descripcion = $_POST['descripcion'];
$eventosID = $_POST['eventosID'];
$Imagen = addslashes(file_get_contents($_Files['Imagen']['tmp_name']));


$sentencia = $mbd -> prepare("INSERT INTO reposteria(pasteleria, descripcion,evento_id, Imagen) VALUES ('$nombre','$descripcion','$eventosID','$Imagen')");
$sentencia -> bindParam(1, $nombre);
$sentencia -> bindParam(2, $descripcion);
$sentencia -> bindParam(3, $eventosID);
$sentencia -> bindParam(4, $Imagen);


$sentencia -> execute();

header('Location: mostrarReposteria.php');

 ?>
