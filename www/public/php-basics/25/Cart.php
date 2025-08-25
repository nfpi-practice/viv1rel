<?php
class Cart
{
    private $products = [];

    public function add($product)
    {
        return $this->products[] = $product;
    }

    public function remove($name)
    {
        foreach ($this->products as $key => $product) {
            if ($product->getName() === $name) {
                unset($this->products[$key]);
            }
        }
    }

    public function getTotalCost()
    {
        $sum = 0;

        foreach ($this->products as $product) {
            $sum += $product->getCost();
        }

        return $sum;
    }

    public function getTotalQuantity()
    {
        $sum = 0;

        foreach ($this->products as $product) {
            $sum += $product->getQuantity();
        }

        return $sum;
    }

    public function getAvgPrice()
    {
        $totalCost = $this->getTotalCost();
        $totalQuantity = $this->getTotalQuantity();

        return $totalCost / $totalQuantity;
    }
}