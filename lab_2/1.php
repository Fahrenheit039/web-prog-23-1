<?php

$very_bad_unclear_name = "15 chicken wings";

$order =& $very_bad_unclear_name;
echo $order . "\n";

$order .= "_";
$someString = "q1w2e3";
echo $someString . "\n";
$order .= $someString;
echo $order;

echo "\nYour order is: $very_bad_unclear_name.";
