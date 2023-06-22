<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class Root
{
    private Validator $validator;
    private bool $error = false;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    /**
     * calc
     */
    private $root;
    public function calc(int $n, int $x)
    {
        try {
            $this->validation();
            $this->root = pow($n, 1 / $x);
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
        }
        return $this;
    }

    public function getRoot(){
        return $this->root;
    }
    // ------------------------private functions
    private function validation()
    {
    }
}
