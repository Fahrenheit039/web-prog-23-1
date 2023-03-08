<?php

$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

$sum = 0;
$i = 0; //iterator
while($sum < 10)
    $sum += $array[$i++];

echo $i+1;

