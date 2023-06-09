<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class template
{
    private Validator $validator;
    private bool $error = false;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function calc()
    {
        try {
            $this->validation();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // ------------------------private functions
    private function validation()
    {
    }
}
