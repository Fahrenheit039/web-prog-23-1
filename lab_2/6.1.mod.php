<?php

$a = 10;
$b = 3;
echo $a % $b . "\n";

echo "\nEnter numbers:";
$a = readline("\na = ");
$b = readline("\nb = ");
if ($a % $b == 0)
    echo "Is divided";
elseif ($a % $b <> 0)
    echo "Divided with remainder";
else
    echo "Something went wrong";
