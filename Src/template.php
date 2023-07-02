<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class Template
{
    private Validator $validator;
    private bool $error = false;
    private $result;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    /**
     * set
     */
    public function set()
    {
        try {
            $this->validation();
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
        }
        return $this;
    }

    public function get(){
        if ($this->error) {
            return;
        }
        return $this->result;
    }
    // ------------------------private functions
    private function validation()
    {
    }
}
