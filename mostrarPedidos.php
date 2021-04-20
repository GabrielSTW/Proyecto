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
    <title>Tabla Pastelerias</title>

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
            <a class="nav-link dropdown-toggle" href="#.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pedidos</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">

              <a class="dropdown-item" href="#">Tabla Eventos</a>
              <?php
              if ($_SESSION['nivel'] == 1)
              {
              ?>
              <a class="dropdown-item" href="mostrarPedidos.php">Agregar pedido </a>
              <?php
              }
              ?>
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

  <?php
  require("conexion.php");


    $sentencia = $mbd -> prepare("SELECT
  a1.Id,
  a1.pasteleria,
  a1.descripcion,
  c1.descripcion as desevento
  FROM
  reposteria a1
  INNER JOIN eventos c1
  ON a1.evento_id = c1.Id;");
    $sentencia -> execute();
    ?>

    <div class="container">

    <center><h1> Tabla de Pastelerias </h1></center>
    <table class="table table-striped table-dark">
        <thead>
          <tr>

            <th scope="col">ID</th>
            <th scope="col">Pasteleria</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Evento</th>
            <?php
            if ($_SESSION['nivel'] == 1)
            {
            ?>
            <th scope="col">Pedido</th>

            <?php
            }
            ?>
            <th scope="col">IMG</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($fila = $sentencia -> fetch())
          {
          ?>
          <tr>

            <td><?php echo $fila['Id'] ?></td>
            <td><?php echo $fila['pasteleria'] ?></td>
            <td><?php echo $fila['descripcion'] ?></td>
            <td><?php echo $fila['desevento'] ?></td>
            <?php
            if ($_SESSION['nivel'] == 1)
            {
            ?>
            <td><a class="btn btn-warning" href="Enviar.php?id=<?php echo $fila['id'];?>" onclick="return confirm('Esta seguro de enviar el pedido')" role="button">Pedido</a></td>
            <?php
            }
            ?>

            <td><img height="50 px" src="data:image/jpg;base64,<?php echo base64_encode($fila['Imagen'])?>"></td>

          </tr>
        <?php
           }

        ?>
        </tbody>
      </table>

      <div class="col-12">

      </div>


</main><!-- /.container -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


  </body>
</html>
