<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Math\Decimal;

$z = (new Decimal)->calc("AAA",10,16);
print_r($z->getDecimal());
echo "\n";
