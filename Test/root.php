<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Math\Root;

$z = new Root;
// 8の3乗根
echo json_encode($z->calc(8,3)->getRoot());
echo "\n";
// 16の2乗根
echo json_encode($z->calc(16,2)->getRoot());
echo "\n";
// 24の12乗根
echo json_encode($z->calc(24,12)->getRoot());
