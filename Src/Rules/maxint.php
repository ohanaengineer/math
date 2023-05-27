<?php

namespace Math\Rules;

use Math\Consts\Errormsg;
use Exception;

trait Maxint
{
    /**
     * Return if $value is less than $int.
     * if $condition[1] is true , $int is included.
     * if $condition[1] is false , $int is not included.
     *
     * @param mixed $value
     * @param array $conditions
     *  $condition[0] is int $num.
     *  $condition[1] is bool $eq.
     * @return bool|Exception
     */
    private function maxInt(int $value, array $conditions)
    {
        if (!is_array($conditions)) {
            $this->error = sprintf(Errormsg::IS_NOT_ARRAY, '$conditions');
            throw new Exception($this->error);
        }
        $c = $conditions;
        $r = $c[1] ? $value <= $c[0] : $value < $c[0];
        if (!$r) {
            throw new Exception($this->error);
        }
        return true;
    }
    //if $value <= $num , true
    private function maxT(int $value, int $num)
    {
        $this->error = sprintf(Errormsg::LESS_THAN_NUM, $this->attr, $num);
        return $this->maxInt($value, [$num, true]);
    }
    //if $value < $num , true
    private function maxF(int $value, int $num)
    {
        $this->error = sprintf(Errormsg::LESS_THAN_OR_NUM, $this->attr, $num);
        return $this->maxInt($value, [$num, false]);
    }
}
