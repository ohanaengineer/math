<?php

namespace Math;

use Exception;
use Math\Util\Validator;

/**
 * ヘロンの公式
 */
class Heron
{
    private Validator $validator;
    private int|float $surface, $a, $b, $c;
    private array $angles, $high;
    private bool $error = false;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function calc(int|float $a, int|float $b, int|float $c)
    {
        [$this->a, $this->b, $this->c] = [$a, $b, $c];
        try {
            $this->validation();
            $this->getHerons();
            $this->getHighs();
            $this->getAngles();
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
        }
        return $this;
    }
    public function getHeron(){
        if($this->error){
            return;
        }
        return $this->surface;
    }

    public function getHigh(string $side){
        if($this->error){
            return;
        }
        try{
            if(!in_array($side,['a','b','c'])){
                throw new Exception('辺はa,b,cしかありません');
            }
            return $this->high[$side];
        }catch(Exception $e){
            echo $e->getMessage();
            return $this;
        }
    }
    public function getAngle(string $angle){
        if($this->error){
            return;
        }
        $angle = mb_strtoupper($angle);
        try{
            if(!in_array($angle,['A','B','C'])){
                throw new Exception('角はA,B,Cしかありません');
            }
            return $this->angles[$angle];
        }catch(Exception $e){
            return $e->getPrevious();
        }
    }

    // ------------------------private functions
    private function getHerons()
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        $tmp = $s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c);
        $this->surface = sqrt($tmp);
    }
    // $subject = 'a' or 'b' or 'c'
    // A,B,Cから、対辺a,b,cに対する高さを取得します
    private function getHighSubject(string $subject){
        $this->high[$subject] = (2 * $this->surface) / $this->{$subject};
    }
    private function getHighs(){
        $this->getHighSubject('a');
        $this->getHighSubject('b');
        $this->getHighSubject('c');
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
