<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class Tsurukame
{
    private Validator $validator;
    private bool $error = false;
    private $result = null;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    /**
     * set
     */
    public function set(int $legs, int $heads, array $options = [2, 4])
    {
        try {
            $this->validation();
            for ($cranes = 0; $cranes <= $heads; $cranes++) {
                $turtles = $heads - $cranes;

                $total = ($cranes * $options[0]) + ($turtles * $options[1]);

                if ($total === $legs) {
                    $this->result = [
                        0 => $cranes,
                        1 => $turtles
                    ];
                    break;
                }
            }
            return $this;
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
        }
        return $this;
    }

    public function getTsurukame(){
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
