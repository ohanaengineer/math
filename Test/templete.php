<?php

namespace Test;

require __DIR__ . "/../vendor/autoload.php";

// ①呼びたい関数をuseする
use Math\Template;

// ②ドキュメントに合わせて、setを呼び出します
$z = (new Template)->set();

// ③必要に応じて、メソッドチェーンを使用してください。
print_r($z);
echo "\n";
