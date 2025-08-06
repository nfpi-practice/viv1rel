<?php
class Date
{
    private $day;
    private $month;
    private $year;
    private $timestamp;

    public function __construct($date = null)
    {
        if ($date == null) {
            $this->day = date('d');
            $this->month = date('m');
            $this->year = date('Y');
            $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        } else {
            $this->day = date('d', strtotime($date));
            $this->month = date('m', strtotime($date));
            $this->year = date('Y', strtotime($date));
            $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        }
    }

    public function getDay()
    {
        return date('d', $this->timestamp);
    }

    public function getMonth($lang = null)
    {
        $months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

        if ($lang === null) {
            return date('m', $this->timestamp);
        } elseif ($lang === 'en') {
            return date('F', $this->timestamp);
        } elseif ($lang === 'ru') {
            return $months[date('l', $this->timestamp)];
        }
    }

    public function getYear()
    {
        return date('Y', $this->timestamp);
    }

    public function getWeekDay($lang = null)
    {
        $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];

        if ($lang === null) {
            return date('N', $this->timestamp);
        } elseif ($lang === 'en') {
            return date('l', $this->timestamp);
        } elseif ($lang === 'ru') {
            return $days[date('N', $this->timestamp) - 1];
        }
    }

    public function addDay($value)
    {
        $this->timestamp = strtotime("+$value days", $this->timestamp);
        return $this;
    }

    public function subDay($value)
    {
        $this->timestamp = strtotime("-$value days", $this->timestamp);
        return $this;
    }

    public function addMonth($value)
    {
        $this->timestamp = strtotime("+$value months", $this->timestamp);
        return $this;
    }

    public function subMonth($value)
    {
        $this->timestamp = strtotime("-$value months", $this->timestamp);
        return $this;
    }

    public function addYear($value)
    {
        $this->timestamp = strtotime("+$value years", $this->timestamp);
        return $this;
    }

    public function subYear($value)
    {
        $this->timestamp = strtotime("-$value years", $this->timestamp);
        return $this;
    }

    public function format($format)
    {
        return date($format, $this->timestamp);
    }

    public function __toString()
    {
        return date('Y-m-d', $this->timestamp);
    }
}

$date = new Date('2025-12-31');

echo $date->getYear() . '<br>';  // выведет '2025'
echo $date->getMonth() . '<br>'; // выведет '12'
echo $date->getDay() . '<br>';   // выведет '31'

echo $date->getWeekDay() . '<br>';     // выведет '3'
echo $date->getWeekDay('ru') . '<br>'; // выведет 'среда'
echo $date->getWeekDay('en') . '<br>'; // выведет 'wednesday'

echo (new Date('2025-12-31'))->addYear(1) . '<br>'; // '2026-12-31'
echo (new Date('2025-12-31'))->addDay(1) . '<br>';  // '2026-01-01'

echo (new Date('2025-12-31'))->subDay(3)->addYear(1) . '<br>'; // '2026-12-28'