<?php
class Driver extends Employee
{
    private $experience;
    private $category;

    public function getExperience()
    {
        return $this->experience;
    }

    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        if ($this->isCategoryCorrect($category)) {
            $this->category = strtoupper($category);
        }
    }

    private function isCategoryCorrect($category)
    {
        $allowedCategories = ['A', 'B', 'C', 'D'];
        $category = strtoupper($category);
        return in_array($category, $allowedCategories);
    }
}