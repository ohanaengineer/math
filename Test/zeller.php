<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Src\Zeller;

$z = new Zeller;
echo $z->calc(2023, 5, 25)->h;
echo $z->getDate('jp');
