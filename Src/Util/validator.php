<?php

namespace Src\Util;

use Exception;
use Src\Consts\Errormsg;
use Src\Rules\Maxint;
use Src\Rules\Minint;
use Src\Rules\Type;

class Validator
{
    use Maxint, Minint, Type;


    private $error;
    private $attr;
    /**
     * this is main function.
     * if you need to compare values, set $comparison.
     *
     * @param mixed $value
     * @param array $methods [[$method ,$comparison],...]
     * @return void
     */
    public function exec(mixed $value, array $methods, string $attribute = null)
    {
        if (!is_array($methods)) {
            $this->error = sprintf(Errormsg::IS_NOT_ARRAY, '$method');
            throw new Exception($this->error);
        }
        $this->attr = $attribute ?? '$value';
        foreach ($methods as $key => $val) {
            $method = $key;
            $comparison = $val ?? null;
            if (!method_exists($this, $method)) {
                $error = sprintf(Errormsg::FUNCTION_DOES_NOT_EXIST, $method);
                throw new Exception($error);
            }
            $this->{$method}($value, $comparison);
        }
    }
}
