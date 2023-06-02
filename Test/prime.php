<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Math\Prime;

$z = (new Prime)->calc(200);
print_r($z?'t':'f');
