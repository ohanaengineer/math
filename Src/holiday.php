<?php

namespace Math;

use Exception;
use Math\Util\Validator;
use Math\Util\Curl;
use Math\Zeller;

class Holiday
{
    private Validator $validator;
    private bool $error = false;
    private array $days, $holidays, $public_holidays, $optiondays = [];
    private int $year, $month, $day, $last, $result = 0;
    private Zeller $zeller;
    public function __construct()
    {
        $this->validator = new Validator;
        $this->zeller = new Zeller;
    }

    /**
     * set
     * 休日 [土,日,月,火,水,木,金,祝]のうち、該当する値だけ追加
     * $holidays = [0,1,2,3,4,5,6,7]
     */
    public function set(array $startday, array $holidays, array $optiondays = [], int $addlast = 0)
    {
        try {
            $this->validation();
            [$this->year, $this->month, $this->day] = $startday;
            $this->holidays = $holidays;
            $this->optiondays = $optiondays;
            $this->last = $addlast;
            // 曜日別の休み日数をセット
            $this->setDays();

            // 祝日が休みとして設定されている場合、元々の休みとかぶっていない祝日日数を取得する
            if (in_array(7, $this->holidays)) {
                $this->setPublicHolidays();
            }
            $this->setLastCalc();
            foreach ($this->holidays as $day) {
                if ($day === 7) {
                    break;
                }
                $this->result += $this->days[$day];
            }
            $this->result += $this->last;
            return $this;
        } catch (Exception $e) {
            $this->error = true;
            echo $e->getMessage();
        }
        return $this;
    }

    public function getHoliday()
    {
        if ($this->error) {
            return;
        }
        return $this->result;
    }
    // ------------------------private functions
    private function validation()
    {
    }
    private function setDays()
    {
        // 少なくとも52週なので、土〜金に52設置する
        $this->days = array_fill(0, 7, 52);

        // 渡ってきた最初の日の曜日を取得
        $firstday = $this->zeller->set($this->year, $this->month, $this->day)->getZeller();

        // 最初の日の曜日は、365日後の曜日と一致するので、その曜日を+1
        $this->days[$firstday] += 1;

        // 閏年の場合、さらに次の曜日も+1する
        if ($this->isLeapYear()) {
            $this->days[$firstday + 1] += 1;
        }
    }
    private function isLeapYear()
    {
        $year = $this->year;
        if ($this->month < 3) {
            $year += 1;
        }
        return date('L', mktime(0, 0, 0, 1, 1, $year));
    }

    private function setPublicHolidays()
    {
        $url = "https://holidays-jp.github.io/api/v1/{$this->year}/date.json";
        $z = (new Curl)->exec($url);
        $arr = json_decode($z);
        //ページ取得できなかった場合、json_encodeすると文字列でnullになる
        if (json_encode($arr) === 'null') {
            throw new Exception('対象年の休日が取得できませんでした。');
        }
        $this->public_holidays = array_keys(get_object_vars($arr));
    }
    private function setLastCalc()
    {
        $totalHolodays = array_unique(array_merge($this->public_holidays, $this->optiondays));
        while ($totalHolodays) {
            $day = array_shift($totalHolodays);
            [$y, $m, $d] = explode('-', $day);
            $daynum = $this->zeller->set($y, $m, $d)->getZeller();
            //元々休みの日とかぶっていなかったら、最終休みの日数にプラスする
            if (!in_array($daynum, $this->holidays)) {
                $this->last += 1;
            }
        }
    }
}
