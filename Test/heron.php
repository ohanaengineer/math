<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Math\Heron;

$z = new Heron;
$triangle = $z->calc(5,4,3);
print_r($triangle);
echo $triangle->angles['A'];
echo "\n";

echo $triangle->angles['B'];
echo "\n";

echo $triangle->angles['C'];

echo "\n";
