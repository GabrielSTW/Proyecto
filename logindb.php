<?php
  require("conexion.php");

  $correo = $_POST['email'];
  $contra = $_POST['password'];

  $sentencia = $mbd->prepare("SELECT * FROM usuarios WHERE correo=? and contrasena=? ");
  $sentencia->bindParam(1, $correo);
  $sentencia->bindParam(2, $contra);
  $sentencia->execute();

  $registro = $sentencia->fetch();

  if($registro == false)
  {
    header('Location: index.php?res=som'); //si se equivo se regresa al index
  }
  else //Se habre la session donde se fguardan las variables
  {
    session_start(); //var_dump($registro); es para ver lo que se manda


    echo $nombre = $registro['nombre'];
    echo $nivel = $registro['nivel_id'];

    $_SESSION['nombre'] = $nombre;
    $_SESSION['nivel'] = $nivel;

    header('Location: Inicio.php');

  }

?>
