<?php

#assignment 1:
echo (int)(15.2 + 14.7 + (10.5 + 10.5)); // 50
echo "<br>";
echo gettype((int)(15.2 + 14.7 + (10.5 + 10.5))); // Integer

echo "<br>";

#assignment 2:
echo gettype(100);
echo "<br>";
echo var_dump(100);
echo "<br>";
echo print_r(100);   // not accutare 

echo "<br>";

#assignment 3: print // Hello "Elzero" \\ """ We Love "$$PHP" without using Heredoc or Nowdoc
echo "\\\\ Hello \"Elzero\" \\\\ \"\"\" We Love \"\$\$PHP\"";

echo "<br>";

#assignment 4:
echo nl2br("We
            Love
            Elzero
            Web
            School"
            );

echo "<br>";

#assignment 5:
echo "<pre>";
echo <<<'TEXT'
Hello "'Elzero'"
We Love $Programming$
Languages Specially "PHP"
TEXT;
echo "</pre>";

echo "<br>";

#assignment 6: [1] Fix The Error , [2] Remove 2 Characters To Get The Output => Needed Output :Hello \PHP\ We Love Programming
$something = "Programming";
echo <<<"code"
Hello \PHP\
We Love $something
code;

echo "<br>";

#assignment 7:
echo (bool)"Hello PHP";  //1
echo '<br>';
echo gettype((Integer)"Hello PHP");  //Integer

echo '<br>';

#assignment 8:
/*Neaded Output:
        Array
        (
        [FrontEnd] => Array
            (
            [0] => HTML
            [1] => CSS
            [JS] => Array
                (
                [Vuejs] => Array
                    (
                    [2] => v2
                    [3] => v3
                    )

                [0] => Reactjs
                [1] => Svelte
                )
            )

        [BackEnd] => Array
            (
            [0] => PHP
            [1] => MySQL
            [2] => Security
            )

        [0] => Git
        [1] => Github
        [Testing] => Array
            (
            [0] => Unit Testing
            [1] => End To End
            [2] => Integration
            )
        )
*/
$arr = [
  "FrontEnd" => [
    "HTML",
    "CSS",
    "JS" => [
      "Vuejs" => [
        2 => "v2",
        3 => "v3"
      ],
      "Reactjs",
      "Svelte"
    ]
  ],
  "BackEnd" => [
    "PHP",
    "MySQL",
    "Security"
  ],
  "Git",
  "Github",
  "Testing" => [
    "Unit Testing",
    "End To End",
    "Integration"
  ]
];
echo "<pre>";
print_r($arr);
echo "</pre>";