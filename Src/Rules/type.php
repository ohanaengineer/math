<?php

namespace Math\Rules;

use Math\Consts\Errormsg;
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
