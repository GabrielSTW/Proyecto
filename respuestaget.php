<?php

$nombre = $_GET['nombre'];
$edad = $_GET['edad'];

$numero = $_GET['numero'];

echo "<h1><center> Trabajo </center></h1>";

echo "<h3><center> Hola $nombre estos son los resultados de los datos que proporcionaste </center></h3>";
//-----------------------Tablas de multiplicar----------------------------
echo " <h3> Tabla de multiplicar </h3>";

$tabla = $numero;
for ($i=1; $i <= 10 ; $i++)
{
  $res= $tabla * $i;
  echo "$tabla * $i = $res";
  echo "<br>";
}

echo "<h3> Operaciones Basicas </h3>";

  //-----------------------Operaciones basicas----------------------------

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

$suma = $num1 + $num2;
$resta = $num1 - $num2;
$multiplicacion = $num1 * $num2;
$division = $num1 / $num2;

echo "La suma de $num1 + $num2 es: $suma <br>";
echo "<br>";
echo "La resta de $num1 - $num2 es: $resta <br>";
echo "<br>";
echo "La multiplicacion de $num1 * $num2 es: $multiplicacion <br>";
echo "<br>";
echo "La division de $num1 / $num2  es: $division <br>";
echo "<br>";
//-----------------------Perimetros----------------------------

echo "<h3> Perimetros de figuras </h3>";

echo "Valor 1 = $num1 <br>";
echo "valor 2 = $num2 <br><br>";
$Perimetro = "";

if (isset($_GET['PerCuadrado']))
  {
    $Perimetro = $num1 * 4;
    echo "<h4> Cuadrado </h4>";
    echo "El perimetro del cuadrado es: $Perimetro";
  }
if (isset($_GET['PerRectangulo']))
  {
    $Perimetro = ($num1*2) + ($num2*2);
    echo "<h4> Rectangulo </h4>";
    echo "El perimetro del rectangulo es: $Perimetro";
  }
if (isset($_GET['PerCirculo']))
  {
    $Perimetro = ($num1*2)*3.1416;
    echo "<h4> Circulo </h4>";
    echo "La circunferencia es: $Perimetro";

  }
if (isset($_GET['PerTriangulo']))
  {
    $Perimetro = $num1*3;
    echo "<h4> Triangulo </h4>";
    echo "El perimetro del Triangulo es: $Perimetro";

  }
//-----------------------Areas----------------------------
echo "<h3> Areas de las figuras </h3>";

$Cua = "";
$Rec = "";
$Circu = "";
$Trian = "";

$Areas = "";
if(isset($_GET['area']))
  {
    $Area = $_GET['area'];
    if($Area == "Cuadrado")
    {
      $Cua = $num1 * 4;
      echo "El area del $Area es : $Cua";
    }
    if($Area == "Rectangulo")
    {
      $Rec = $num1 * $num1;
      echo "El area del $Area es : $Rec";
    }
    if($Area == "Circulo")
    {
      $Circu = (3.1416*($num1*$num1));
      echo "El area del $Area es : $Circu";
    }
    if($Area == "Triangulo")
    {
      $Trian = (3.1416*($num1*$num1));
      echo "El area del $Area es : $Trian";
    }


  }
  else
    {
      $Area = "No se selecciono genero";
    }




 ?>
