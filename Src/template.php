<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class template
{
    private Validator $validator;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function exec()
    {
        try {
            $this->validation();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    private function validation()
    {
    }
}
