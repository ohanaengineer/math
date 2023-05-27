<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Math\Decimal;

$z = new Decimal;
echo $z->exec("AAA",10,16)."\n";
echo $z->exec(1000,16,10);
