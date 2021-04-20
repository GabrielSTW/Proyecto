<?php
require("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['name'];
$correo = $_POST['email'];
$contra = $_POST['password'];

$sentencia = $mbd->prepare("UPDATE usuarios SET nombre=?, correo=?, contrasena=? WHERE id=?");
$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $correo);
$sentencia->bindParam(3, $contra);
$sentencia->bindParam(4, $id);
$sentencia->execute();

header('Location: mostrarRegistros.php?Bien=nice');

 ?>
