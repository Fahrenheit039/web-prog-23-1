<?php

$var1 = 1;
echo $var1;
echo "\n";

$var2 = 2.22;
echo $var2 . "\n";

echo $var1 . round($var2) . "\n";
echo 6*round($var2) . "\n";

$last_month = 1187.23;
$this_month = 1089.98;
echo "Difference : " . abs($this_month - $last_month) . "\n";
