<?php

echo $a = sqrt(379) . "\n";
echo round($a) . " / " . round($a, 1) . " / " . round($a, 2) . " " . "\n";

echo $b = sqrt(587) . "\n";
$array["ceil"] = ceil($b); //up
$array["floor"] = floor($b); //down

echo "\n" . $array["ceil"] . " / " . $array["floor"];

