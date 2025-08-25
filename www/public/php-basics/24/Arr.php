<?php
class Arr
{
    private $nums = [];
    private $sumHelper;
    private $avgHelper;

    public function __construct()
    {
        $this->sumHelper = new SumHelper();
        $this->avgHelper = new AvgHelper();
    }

    public function getSum23()
    {
        $nums = $this->nums;

        return $this->sumHelper->getSum2($nums) + $this->sumHelper->getSum3($nums);
    }

    public function add($num)
    {
        $this->nums[] = $num;
    }

    public function getAvg()
    {
        return $this->avgHelper->getAvg($this->nums);
    }

    public function getMeanSquare()
    {
        return $this->avgHelper->getMeanSquare($this->nums);
    }

    public function getAvgMeanSum()
    {
        return $this->getAvg() + $this->getMeanSquare();
    }
}