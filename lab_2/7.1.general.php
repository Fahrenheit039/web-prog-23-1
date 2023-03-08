<?php

echo "Enter the number:\n";
$n = readline("\nn = ");

//$sqrtn = floor(sqrt($n));
$i_in_mas = 0; //iterator
$array[$i_in_mas++] = 1;
//for ($i = 2; $i <= $sqrtn; $i++)
for ($i = 2; $i <= $n; $i++)
    if ($n % $i == 0)
    {
        $array[$i_in_mas++] = $i;
        //echo '$i_in_mas = ' . $i_in_mas-1 . "\n";
        //echo '$array[$i_in_mas] = ' . $array[$i_in_mas-1] . "\n";
    }

foreach ($array as $i => $value)
    echo $array[$i] . " ";
