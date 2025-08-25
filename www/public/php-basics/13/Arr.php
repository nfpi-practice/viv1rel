<?php
class Arr {
    private $numbers = [];

    public function add(array $numbers)
    {
        foreach ($numbers as $number) {
            $this->numbers[] = $number;
        }
    }

    public function getAvg()
    {
        if (empty($this->numbers)) {
            return null;
        }
        return array_sum($this->numbers) / count($this->numbers);
    }
}