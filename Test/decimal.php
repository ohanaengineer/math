<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Src\Decimal;

$z = new Decimal;
echo $z->exec("AAA",10,2);
