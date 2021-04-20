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
    <title>Mostrar Articulos</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/starter-template/">

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


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
    <link href="css/starter-template.css" rel="stylesheet">
  </head>
  <body background="media/img/pasteleria.jpg">

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
          <li class="nav-item dropdown">
            <a class="nav-link" href="#">Encargos</a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="mostrarReposteria.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Eventos</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">

              <a class="dropdown-item" href="mostrarEventos.php">Tabla Eventos</a>
              <?php
              if ($_SESSION['nivel'] == 2)
              {
              ?>
              <a class="dropdown-item" href="crearEvento.php">Agregar</a>
              <?php
              }
              ?>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="mostrarReposteria.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pastelerias</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="mostrarReposteria.php">Tabla Pastelerias</a>
              <?php
              if ($_SESSION['nivel'] == 2)
              {
              ?>
              <a class="dropdown-item" href="crearReposteria.php">Agregar</a>
              <?php
              }
              ?>
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

<main role="main" class="container">
<div class="row">
  <div class="col-3">
  </div>
  <div class="col-6">

    <?php
    require("conexion.php");




      $sentencia = $mbd -> prepare("SELECT * FROM eventos");
      $sentencia -> execute();
      ?>


    <h1 >Crear Pasteleria</h1>
    <form action="crearReposteriadb.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="inputName">Nombre de la Pasteleria</label>
        <input type="text" id="inputName" name="reposteria" class="form-control" placeholder="Nombre de la Pasteleria" required autofocus>
        <br>
        <label for="inputName">Description del articulo </label>
        <input type="text" id="inputName" name="descripcion" class="form-control" placeholder="Descripcion del pastel" required autofocus>
        <br>
        <div class="form-group">
            <label for="exampleFormControlEventos">Eventos</label>
            <select class="form-control" id="exampleFormControlEventos" name="eventosID">
              <?php
              while($fila = $sentencia -> fetch())
              {
              ?>
              <option value="<?php echo $fila['Id']; ?>"> <?php echo $fila['descripcion'];?> </option>
              <?php
               }
              ?>
            </select>
        </div>
        <br>


        <button type="submit" class="btn btn-primary">Agregar</button>
        </center>
      </div>
    </form>
  </div>
  <div class="col-3">
  </div>
</div>
</main><!-- /.container -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


  </body>
</html>
