<?php

namespace Src\Rules;

use Src\Consts\Errormsg;
use Exception;

trait Type
{
    private function isInt($value, $unuse)
    {
        if (!is_int($value)) {
            throw new Exception('intじゃない');
        }
        return true;
    }
}
