<?php

namespace Math;

use Exception;
use Math\Util\Validator;

/**
 * エラトステネスの篩
 */
class Eratosthenes
{
    private Validator $validator;
    private bool $error = false;
    private array $num;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    /**
     * set
     */
    public function set(int|float $n)
    {
        try {
            $this->validation();
            // 2からnまでの配列を作ります
            $this->num = array_fill(2, $n - 1, 1);
            for ($i = 2; $i * $i <= $n; $i++) {
                $m = 2;
                while ($i * $m <= $n) {
                    unset($this->num[$i * $m]);
                    $m += 1;
                }
            }
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
        }
        return $this;
    }

    public function getEratosthenes()
    {
        return array_keys($this->num);
    }
    // ------------------------private functions
    private function validation()
    {
    }
}
