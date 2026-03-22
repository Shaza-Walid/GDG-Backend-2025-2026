<?php
#assignment 1:
echo 10 + 20 - 15 - 3 - 190 + 10 + 168; // 0

echo "<br>";

#assignment 2:
$a = "10";
$num1 = (int)$a;
echo $num1; // 10
echo "<br>";
echo gettype($num1); // integer
echo "<br>";
$num3 = $a;
settype($num3, "integer");
echo $num3; // 10
echo "<br>";
echo gettype($num3); // integer
echo "<br>";
$num4 = $a + 0;
echo $num4; // 10
echo "<br>";
echo gettype($num4); // integer
echo "<br>";
$num2 = intval($a);
echo $num2; // 10
echo "<br>";
echo gettype($num2); // integer
echo "<br>";
echo intval($a); // 10
echo "<br>";
echo gettype(intval($a)); // integer

echo "<br>";

#assignment 3:
$a = 10;
$b = 20;
echo $a <=> $b;

echo "<br>";

#assignment 4:
$a = 10;
$b = 20;
$c = 15;
var_dump($a < $b); // True
var_dump($c > $a); // True
var_dump($a <= $b); // True
var_dump($a != $b); // True
var_dump($a <> $c); // True
var_dump($a !== $c); // True
var_dump(gettype($a) == gettype($b)); // True
var_dump(gettype($a) === gettype($b)); // True
var_dump(gettype((float) $a) !== gettype($b)); // True

echo "<br>";

#assignment 5:
$points = 10;
++$points;
$points++;
echo $points; // 13
echo "<br>";
--$points;
--$points;
--$points;
--$points;
echo $points; // 8;
echo "<br>";

#assignment 6:
$a = "Elzero";
$b = "Web";
$c = "School";
$d = $a;
$d .= " $b ";
$d .= "$c";
echo $d; // Elzero Web School
echo "<br>";
$d = $a." ".$b." ".$c;
echo $d; // Elzero Web School
echo "<br>";
$d = "$a $b $c";
echo $d; // Elzero Web School
echo "<br>";
$d = "$a ";
$d .= "$b $c";
echo $d; // Elzero Web School
echo "<br>";

#assignment 7:
$a = 10;
$b = 20;
echo $a*(($a*$a)+($a+$b)*($a+$b)); // 10000

echo "<br>";

#assignment 8:
// Code 1
$a = @$b or die("Custom Error");

// Code 2
$f = @file("Not_A_File") or die("Custom Error");

// Code 3
@include("Not_A_File") or die("Custom Error");