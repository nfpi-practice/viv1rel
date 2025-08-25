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

class Interval
{
    private $date1;
    private $date2;

    public function __construct(Date $date1, Date $date2)
    {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

    public function toDays()
    {
        $date1 = $this->date1->format('U');
        $date2 = $this->date2->format('U');
        $diff = abs($date1 - $date2);
        return $diff / (60 * 60 * 24);
    }

    public function toMonths()
    {
        $date1 = new DateTime($this->date1->format('Y-m-d'));
        $date2 = new DateTime($this->date2->format('Y-m-d'));
        $diff = $date1->diff($date2);
        return $diff->y * 12 + $diff->m;
    }

    public function toYears()
    {
        $date1 = new DateTime($this->date1->format('Y-m-d'));
        $date2 = new DateTime($this->date2->format('Y-m-d'));
        $diff = $date1->diff($date2);
        return $diff->y;
    }
}

$date1 = new Date('2025-12-31');
$date2 = new Date('2026-11-28');

$interval = new Interval($date1, $date2);

echo $interval->toDays() . '<br>';   // выведет разницу в днях
echo $interval->toMonths() . '<br>'; // выведет разницу в месяцах
echo $interval->toYears() . '<br>';  // выведет разницу в годах