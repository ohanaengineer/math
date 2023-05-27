<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class Zeller
{
    public int $y;
    public int $m;
    public int $d;
    public int $h;
    private Validator $validator;
    public function __construct()
    {
        $this->validator = new Validator;
    }
    public function calc(int $y, int $m, int $d)
    {
        $this->y = $y;
        $this->m = $m;
        $this->d = $d;
        try {
            $this->validation();
            $Y = substr($y, -2);
            $this->h =
                $Y + $d +
                floor($Y / 4) -
                floor($y / 100) * 2 +
                floor($y / 400) +
                floor(26 * ($m + 1) / 10);
            $this->h %= 7;
            return $this;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getDate($locale)
    {
        $date_array = [
            'jp' => [
                0 => "土",
                1 => "日",
                2 => "月",
                3 => "火",
                4 => "水",
                5 => "木",
                6 => "金",
            ],
        ];
        return $date_array[$locale][$this->h];
    }
    private function validation()
    {
        $m_valid = [
            'minT' => 1,
            'maxT' => 12,
            'isInt' => null
        ];
        $d_valid = [
            'minT' => 1,
            'maxT' => 31
        ];

        //月は1~12までで指定可能
        $this->validator->exec($this->m, $m_valid, "月");
        //日は1~31までで指定可能
        $this->validator->exec($this->d, $d_valid, "日");
    }
}
