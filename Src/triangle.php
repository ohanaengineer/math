<?php

namespace Math;

use Exception;
use Math\Util\Validator;
use Math\Heron;

class Triangle
{
    private Validator $validator;
    private int|float $a, $b, $c, $A, $B, $C;
    private bool $error = false;
    public function __construct()
    {
        $this->validator = new Validator;
    }
    public function calc(int $a, int $b, int $c)
    {
        [$this->a, $this->b, $this->c] = [$a, $b, $c];
        try {
            $this->validation();
            $heron = (new Heron)->calc($a, $b, $c);
            $this->A = $heron->getAngle('A');
            $this->B = $heron->getAngle('B');
            $this->C = $heron->getAngle('C');
            return $this;
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
            return $this;
        }
    }
    public function getTriangle(string $side){
        if($this->error){
            return;
        }
        return $this->{$side};
    }
    public function getCos(string $side)
    {
        if($this->error){
            return;
        }
        return cos($this->{$side});
    }
    public function getSin(string $side)
    {
        if($this->error){
            return;
        }
        return sin($this->{$side});
    }
    public function getTan(string $side)
    {
        try {
            if ($this->{$side} % 90 === 0) {
                throw new Exception("90の倍数角では、tanを定義できません");
            }
            return tan($this->{$side});
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function getRad(string $side)
    {
        if($this->error){
            return;
        }
        return deg2rad($this->{$side});
    }

    // ------------------------private functions
    private function validation()
    {
        $rule_a = ['minT' => 0, 'maxT' => ($this->b + $this->c)];
        $rule_b = ['minT' => 0, 'maxT' => ($this->a + $this->c)];
        $rule_c = ['minT' => 0, 'maxT' => ($this->a + $this->b)];
        $this->validator->exec($this->a, $rule_a, "辺aの長さ");
        $this->validator->exec($this->b, $rule_b, "辺bの長さ");
        $this->validator->exec($this->c, $rule_c, "辺cの長さ");
    }
}
