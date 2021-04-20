<?php
  session_start();

  if($_SESSION['nivel'] != 1 && $_SESSION['nivel'] != 2)
  {
    header('Location: salir.php');
  }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Signin Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">


    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center" background="media/img/Pasteleria.jpg">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <img src="media/img/O.gif" alt="logo" width="110 px">
      <a class="navbar-brand" href="Inicio.php">Inicio</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="mostrarRegistros.php">Usuarios <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Encargos</a>
          </li>


          <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="mostrarEventos.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Eventos</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">

              <a class="dropdown-item" href="mostrarEventos.php">Tabla Eventos</a>
              <a class="dropdown-item" href="crearEvento.php">Agregar</a>
          </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="mostrarReposteria.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pastelerias</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="mostrarReposteria.php">Tabla Pastelerias</a>
              <a class="dropdown-item" href="crearReposteria.php">Agregar</a>

            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <span class="navbar-text">
            <?php
            echo $_SESSION['nombre'];
            ?>
          </span>
          <a href="salir.php" class="btn btn-dark btn-sm" role="button">salir</a>
        </form>

    </div>
    </nav>
  <?php
    require("conexion.php");
    $vid = $_GET['id'];
    $sentencia = $mbd -> prepare("SELECT * FROM eventos WHERE Id=? ");
    $sentencia -> bindParam(1, $vid);
    $sentencia -> execute();
    $registro = $sentencia->fetch();

    if ($registro == false)
    {
      echo "<div class='alert alert-danger' role='alert'> Usuario no se encontrado </div>";
    }
    else
    {

      ?>

      <form class="form-signin" action="editarEventodb.php" method="post">
        <img src="media/img/little.jpg" alt="logo" width="100 px">

        <h1 class="h3 mb-3 font-weight-normal">Eventos</h1>
        <label for="inputID">ID</label>
        <input type="text" id="inputID" name="id" class="form-control" placeholder="id" value="<?php echo $registro['Id'];?>" required readonly>
        <label for="inputName" >Evento</label>
        <input type="text" id="inputName" name="descripcion" class="form-control" placeholder="descripcion" value="<?php echo $registro['descripcion'];?>" required autofocus>
        <br>


        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Actualizar</button>
        <br>
        <a href="mostrarEventos.php" class="btn btn-dark btn-sm" role="button">Regresar</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
      </form>

      <?php
    }
    ?>






  </body>
</html>
