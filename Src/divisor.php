<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class Divisor
{
    private Validator $validator;
    private bool $error = false;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function calc(int|float $n)
    {
        try {
            $this->validation();
            $i = 1;
            $result[] = 1;

            for ($i = 2; $i * $i <= $n; $i++) {
                if ($n % $i === 0) {
                    return false;
                }
            }
            return $this;
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
        }
        return $this;
    }

    // ------------------------private functions
    private function validation()
    {
    }
}
