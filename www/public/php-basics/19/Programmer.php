<?php
class Programmer extends Employee
{
    private $langs = [];

    public function getLangs()
    {
        return $this->langs;
    }

    public function setLangs($langs)
    {
        $this->langs[] = $langs;
    }
}