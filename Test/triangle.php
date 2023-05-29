<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Math\Triangle;

$z = new Triangle;
$triangle = $z->calc(5,4,3);
echo $triangle->getTan('A');
echo "\n";

echo $triangle->getRad('B');
echo "\n";

echo $triangle->getRad('C');
echo "\n";
