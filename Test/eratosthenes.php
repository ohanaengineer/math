<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

use Math\Eratosthenes;

$z = new Eratosthenes;
$result = $z->calc(100)->getEratosthenes();
echo json_encode($result);
