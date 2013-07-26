<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shibly
 * Date: 7/27/13
 * Time: 3:41 AM
 * To change this template use File | Settings | File Templates.
 */


interface IStrategy
{
    function getFinalBill($billAmount);
}


class LowDiscountStrategy implements IStrategy
{
    public function getFinalBill($billAmount)
    {
        return $billAmount - ($billAmount * 0.1);
    }
}

class HighDiscountStrategy implements IStrategy
{
    public function getFinalBill($billAmount)
    {
        return $billAmount - ($billAmount * 0.5);
    }
}


class NoDiscountStrategy implements IStrategy
{

    public function getFinalBill($billAmount)
    {
        return $billAmount;
    }
}


// Now it's time to use the Strategy

class ShoppingMall
{
    protected $customerName;
    protected $billAmount;
    protected $currentStrategy;

    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    public function getCustomerName()
    {
        return $this->customerName;
    }

    public function setBillAmount($billAmount)
    {
        $this->billAmount = $billAmount;
    }

    public function getBillAmount()
    {
        return $this->billAmount;
    }

    public function __construct(IStrategy $newStrategy)
    {
        $this->currentStrategy = $newStrategy;
    }


    public function getFinalBill()
    {
        return $this->currentStrategy->getFinalBill($this->billAmount);
    }
}


// Final example code

// Today is Monday

$objShoppingMall = new ShoppingMall(new LowDiscountStrategy());
$objShoppingMall->setCustomerName("Monday Customer");
$objShoppingMall->setBillAmount(1000);
echo "Final Bill : " . $objShoppingMall->getFinalBill(); // 10% discount




