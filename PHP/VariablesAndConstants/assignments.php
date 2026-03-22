<?php
    #assignment 1
    $var= "Elzero Courses";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elzero Courses">
    <title>Welcome To <?= $var ?></title>
  </head>
  <body>
    <h1><?= $var ?></h1>
    <p>Here In Elzero Courses We Provide Front-End And Back-End Courses</p>
    <hr>
    <div>Elzero Courses Is The What You Need.</div>
    <footer>All Right Reserved To Elzero Courses</footer>
  </body>
</html>

<?php
#assignment 2: print web in 5 different methods using echo
$name = "elzero";
$$name = "Web";
echo "Web";
echo "<br>";
echo $$name;
echo "<br>";
echo ${$name};
echo "<br>";
echo $elzero;
echo "<br>";
echo ${"elzero"};

echo "<br>";

#assignment 3:
$a = 200;
$b = &$a;   //pass by reference (adding & sign)
$a = 100;
echo $b; // 100

echo "<br>";

#assignment 4:
echo $_SERVER['DOCUMENT_ROOT'];   // Document Root
echo "<br>";
echo $_SERVER['SERVER_NAME'];   // Server Name
echo "<br>";
echo $_SERVER['SystemRoot'];   // System Root
echo "<br>";
echo $_SERVER['OPENSSL_CONF'];   // OpenSSL Configuration

echo"<br>";

#assignment 5:
/*
    10 reserved words:
        abstract
        and
        array
        as
        break
        case
        catch
        class
        const
        continue
*/

#assignment 6:
echo __LINE__;
echo "<br>";
echo __FILE__;
echo "<br>";
echo __DIR__;