<?php

require("conexion.php");



$nombre = $_POST['name'];
$correo = $_POST['email'];
$contrasena = $_POST['password'];
$nivel = 1;

$sentencia = $mbd -> prepare("INSERT INTO usuarios(nombre, correo, contrasena, nivel_id) VALUES (?,?,?,?)");
$sentencia -> bindParam(1, $nombre);
$sentencia -> bindParam(2, $correo);
$sentencia -> bindParam(3, $contrasena);
$sentencia -> bindParam(4, $nivel);

$sentencia -> execute();

header('Location: index.php');


if($registro == false)
{
  header('Location: index.php?res=som'); //si se equivo se regresa al index
}
else //Se habre la session donde se fguardan las variables
{
  session_start(); //var_dump/($registro); es para ver lo que se manda

  $nombre = $registro['nombre'];
  $nivel = $registro['nivel_id'];

  $_SESSION['nombre'] = $nombre;
  $_SESSION['nivel'] = $nivel;

  header('Location: mostrarRegistros.php');

}



 ?>
