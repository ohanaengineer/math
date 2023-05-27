<?php

namespace Math\Rules;

use Math\Consts\Errormsg;
use Exception;

trait Minint
{
    /**
     * Return if $value is more than $int.
     * if $condition[1] is true , $int is included.
     * if $condition[1] is false , $int is not included.
     *
     * @param mixed $value
     * @param array $conditions
     *  $condition[0] is int $num.
     *  $condition[1] is bool $eq.
     * @return bool|Exception
     */
    private function minInt(int $value, array $conditions)
    {
        if (!is_array($conditions)) {
            $this->error = sprintf(Errormsg::IS_NOT_ARRAY, '$conditions');
            throw new Exception($this->error);
        }
        $c = $conditions;
        $r = $c[1] ? $value >= $c[0] : $value > $c[0];
        if (!$r) {
            throw new Exception($this->error);
        }
        return true;
    }
    //if $value >= $num , true
    private function minT(int $value, int $num)
    {
        $this->error = sprintf(Errormsg::MORE_THAN_OR_NUM, $this->attr, $num);
        return $this->minInt($value, [$num, true]);
    }
    //if $value > $num , true
    private function minF(int $value, int $num)
    {
        $this->error = sprintf(Errormsg::MORE_THAN_NUM, $this->attr, $num);
        return $this->minInt($value, [$num, false]);
    }
}
