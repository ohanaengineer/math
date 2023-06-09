<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Math\Heron;

$z = new Heron;
$triangle = $z->calc(8,4,3);
echo $triangle->getAngle('A');
echo "\n";
