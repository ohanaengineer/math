<?php

namespace Math;

use Exception;
use Math\Util\Validator;

/**
 * 素数判定
 */
class Prime
{
    private Validator $validator;
    private bool $check;
    private bool $error = false;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function calc(int|float $n)
    {
        try {
            $this->validation();
            if ($n === 1) {
                $this->check = false;
                return $this;
            }

            for ($i = 2; $i * $i <= $n; $i++) {
                if ($n % $i === 0) {
                    $this->check = false;
                    return $this;
                }
            }
            $this->check = true;
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
        }
        return $this;
    }
    public function getPrime(){
        if($this->error){
            return;
        }
        return $this->check;
    }
    // ------------------------private functions
    private function validation()
    {
    }
}
