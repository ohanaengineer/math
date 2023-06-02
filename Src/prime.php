<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class prime
{
    private Validator $validator;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function calc(int|float $n)
    {
        try {
            $this->validation();
            if ($n === 1) {
                return false;
            }

            for ($i = 2; $i * $i <= $n; $i++) {
                if ($n % $i === 0) {
                    return false;
                }
            }
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    private function validation()
    {
    }
}
