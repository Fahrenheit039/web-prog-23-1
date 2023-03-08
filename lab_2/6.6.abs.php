<?php

echo "Enter numbers:\n";
$a = readline("\na = ");
$b = readline("\nb = ");
echo abs($a - $b) . "\n";

$array = [1, 2, -1, -2, 3, -3];
foreach ($array as $i => $value)
    if ($array[$i] < 0)
        $array[$i] = abs($array[$i]);

foreach ($array as $i => $value)
    echo $array[$i] . " ";
