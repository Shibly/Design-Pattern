<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shibly
 * Date: 7/28/13
 * Time: 2:59 AM
 * To change this template use File | Settings | File Templates.
 */


class Customer
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}


class Loan
{

    /**
     * @param Customer $c
     * @return bool
     */
    public function HasNoBadLoans(Customer $c)
    {
        echo "Check loans for " . $c->getName() . "<br/>";
        return true;
    }
}


class Credit
{
    /**
     * @param Customer $c
     * @return bool
     */
    public function HasGoodCredit(Customer $c)
    {
        echo "Check credit for " . $c->getName() . "<br/>";
        return true;
    }
}

class Bank
{
    /**
     * @param Customer $c
     * @return bool
     */
    Public function HasSufficientSavings(Customer $c)
    {
        echo " Check bank for " . $c->getName() . "<br/>";
        return true;
    }
}


class Mortgage
{
    private $bank;
    private $loan;
    private $credit;
    var $eligible = True;

    /**
     * @param Customer $customer
     * @param $amount
     */
    public function IsEligible(Customer $customer, $amount)
    {
        $this->bank = new Bank();
        $this->loan = new Loan();
        $this->credit = new Credit();

        echo $customer->getName() . " Applied for loan " . $amount . "<br/>" . "<br/>";

        if (!$this->bank->HasSufficientSavings($customer)) {
            $this->eligible = False;
        } else if (!$this->loan->HasNoBadLoans($customer)) {
            $this->eligible = False;
        } else if (!$this->credit->HasGoodCredit($customer)) {
            $this->eligible = False;
        }
    }
}


// Let's test

$mortgage = new Mortgage();
$customer = new Customer("Shibly");
$eligible = $mortgage->IsEligible($customer, 125000);

echo "<br/>" . $customer->getName() . " has been " . ($mortgage->eligible ? "Approved" : "Rejected");
