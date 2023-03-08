<?php

$n = readline("\nn = ");

function f($x)
{
    $sum = 0;
    while($x > 9)
    {
        $sum += $x % 10;
        $x /= 10;
        $x = floor($x);
        echo $x . " " . $sum . "\n";
    }
    $sum += $x;
    echo "sum on this iteration = " . $sum . "\n";

    if ($sum <= 9) return $sum;
    else return f($sum);
}

if ($n > 9)
    echo f($n);

