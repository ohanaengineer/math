<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class heron
{
    private Validator $validator;
    public int|float $surface, $a, $b, $c;
    public array $angles, $high;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function calc(int|float $a, int|float $b, int|float $c)
    {
        [$this->a, $this->b, $this->c] = [$a, $b, $c];
        try {
            $this->validation();
            $this->getHeron();
            $this->getHighs();
            $this->getAngles();
            return $this;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    private function getHeron()
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        $tmp = $s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c);
        $this->surface = sqrt($tmp);
    }
    // $subject = 'a' or 'b' or 'c'
    // 選択した辺に対する角A,B,Cの高さを取得します
    private function getHigh(string $subject){
        $this->high[$subject] = (2 * $this->surface) / $this->{$subject};
    }
    private function getHighs(){
        $this->getHigh('a');
        $this->getHigh('b');
        $this->getHigh('c');
    }
    private function getAngles()
    {
        $tmph = $this->high['a'];
        $this->angles['B'] = rad2deg(asin($tmph / $this->c));
        $this->angles['C'] = rad2deg(asin($tmph / $this->b));
        $this->angles['A'] = 180 - ($this->angles['B'] + $this->angles['C']);
    }
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
