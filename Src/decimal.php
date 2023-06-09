<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class Decimal
{
    private Validator $validator;
    private array $number = [
        0 => "0",
        1 => "1",
        2 => "2",
        3 => "3",
        4 => "4",
        5 => "5",
        6 => "6",
        7 => "7",
        8 => "8",
        9 => "9",
        10 => "A",
        11 => "B",
        12 => "C",
        13 => "D",
        14 => "E",
        15 => "F",
        16 => "G",
        17 => "H",
        18 => "I",
        19 => "J",
        20 => "K",
        21 => "L",
        22 => "M",
        23 => "N",
        24 => "O",
        25 => "P",
        26 => "Q",
        27 => "R",
        28 => "S",
        29 => "T",
        30 => "U",
        31 => "V",
        32 => "W",
        33 => "X",
        34 => "Y",
        35 => "Z",
    ];
    private int $t, $f;
    private int|string $v;
    private bool $error = false;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    /**
     * Undocumented function
     *
     * @param integer|string $val 変換したい値
     * @param integer $to 変換先の進数(default:2進数)
     * @param integer $from 変換元の進数(default:10進数)
     * @return void
     */
    public function calc(int|string $val, int $to = 2, int $from = 10)
    {
        [$this->v, $this->t, $this->f] = [$val, $to, $from];
        try {
            $this->validation();
            //変換元が10進数でない場合、一旦10進数に変換する
            if ($from !== 10) {
                $this->v = $this->naryToDecimal($this->v, $from);
            }
            //10進数から、変換先の進数に変換する
            //10進数→10進数は変換必要ないのでそのまま
            if ($to !== 10) {
                $this->v = $this->decimalToNary($this->v, $to);
            }
            return $this;
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
            return $this;
        }
    }
    public function getDecimal(){
        if($this->error){
            return;
        }
        try{
            return $this->v;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    // ------------------------private functions
    private function decimalToNary(int $val, int $to)
    {
        $result = "";
        while ($val > 0) {
            $q = $val % $to;
            $result = $this->number[$q] . $result;
            $val = (int)($val / $to);
        }
        return $result;
    }
    private function naryToDecimal(string $val, int $to)
    {
        $num = 0;
        $len = strlen($val);
        for ($i = 0; $i < $len; $i++) {
            $tmp = array_search($val[$i], $this->number);
            if ($tmp >= $to) {
                throw new Exception("{$to}進数で使用できない文字が含まれています:{$val[$i]}");
            }
            $num += $tmp * ($to ** ($len - 1 - $i));
        }
        return $num;
    }
    private function validation()
    {
        if ($this->f === 10) {
            $this->validator->exec($this->v, ['isInt' => null], "10進数の場合、変換対象");
        }
        $rule = ['minT' => 1, 'maxT' => 36];
        $this->validator->exec($this->t, $rule, "変換先の進数");
        $this->validator->exec($this->f, $rule, "変換元の進数");
    }
}
