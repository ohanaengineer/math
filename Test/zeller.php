<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Math\Zeller;

$z = new Zeller;
echo $z->calc(2023, 5, 25)->h."\n";
echo $z->getDate('jp');
