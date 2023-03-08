<?php

echo $st = pow(2, 10) . "\n\n";

echo sqrt(245) . "\n\n";

$array = array(4, 2, 5, 19, 13, 0, 10);
$sum_array = 0;
foreach ($array as $i => $value)
    $sum_array += pow($array[$i], 2);
/*for ($i = 0; $i < count($array); $i++)
    $sum_array += pow($array[$i], 2);
*/
echo "Answer = " . $answer = sqrt($sum_array);
