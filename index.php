<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><center>Ejercicio 1.01</center></h1>


    <form action="respuestapost.php" method="post">
      <input type="text" name="nombre" placeholder="Ingrese su nombre">  <br>
      <input type="number" name="edad" placeholder="Ingrese su edad" step="1"><br>

      <br>
      <h3> Tabla de Multiplicar </h3>
      <br>
      <input type="number" name="numero" placeholder="Ingrese un numero" step="1"><br>
      <br>
      <h3> Operaciones Basicas </h3>
      <br>
      <input type="number" name="num1" placeholder="Primer numero" step="1"><br>
      <input type="number" name="num2" placeholder="Segundo numero" step="1"><br>

      <br>
      <h3> Perimetros de las figuras </h3>
      <br>
      <input type="checkbox" name="PerCuadrado" value="Cuadrado" > Cuadrado <br>
      <input type="checkbox" name="PerRectangulo" value="Rectangulo"> Rectangulo <br>
      <input type="checkbox" name="PerCirculo" value="Circulo"> Circulo <br>
      <input type="checkbox" name="PerTriangulo" value="Triangulo"> Triangulo <br>

      <br>
      <h3> Areas de las figuras </h3>
      <br>
      <input type="radio" name="area" value="Cuadrado"> Cuadrado <br>
      <input type="radio" name="area" value="Rectangulo"> Rectangulo <br>
      <input type="radio" name="area" value="Circulo"> Circulo <br>
      <input type="radio" name="area" value="Triangulo"> Triangulo <br>




      <br><br>
      <input type="submit" name="enviar" value="Enviar informacion">


    </form>








  </body>
</html>
