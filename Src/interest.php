<?php

namespace Math;

use Exception;
use Math\Util\Validator;

class Interest
{
    private Validator $validator;
    private bool $error = false;
    private array $simple, $compound;
    private $y, $p, $i;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    /**
     * set
     */
    public function set($years, $principal, $interestRate)
    {
        try {
            [$this->y, $this->p, $this->i] = [$years, $principal, $interestRate];
            $this->validation();
            $simple = $this->getSimple($this->y, $this->p, $this->i);

            $this->simple = [
                'interest' => $simple,
                'total' => $principal + $simple
            ];

            $compound = $this->getCompound($this->y, $this->p, $this->i);
            $this->compound = [
                'interest' => $compound,
                'total' => $principal + $compound
            ];
            return $this;
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
        }
        return $this;
    }

    public function getInterest(bool $method = true)
    {
        if ($this->error) {
            return;
        }
        $m = match ($method) {
            true => 'simple',
            false => 'compound'
        };
        return $this->{$m};
    }

    public function getHistory(bool $method = true)
    {
        if ($this->error) {
            return;
        }
        $principal = $this->p;
        $history[0] = $principal;
        if ($method) {
            // 単利の場合、元本から考えて常に一定額が追加されます
            $money = $this->p * $this->i;
            for ($i = 0; $i < $this->y; $i++) {
                $principal += $money;
                $history[$i + 1] = $principal;
            }
        } else {
            // 複利は、年単位で考えれば単利の連続なので、単利関数を使用します。
            for ($i = 0; $i < $this->y; $i++) {
                $principal += $this->getSimple(1, $principal, $this->i);
                $history[$i + 1] = $principal;
            }
        }
        return $history;
    }
    // ------------------------private functions
    private function validation()
    {
    }

    private function getSimple($year, $principal, $interestRate)
    {
        return $principal * $interestRate * $year;
    }

    private function getCompound($year, $principal, $interestRate)
    {
        return $principal * pow((1 + $interestRate), $year) - $principal;
    }
}
