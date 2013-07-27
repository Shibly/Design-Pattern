<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shibly
 * Date: 7/27/13
 * Time: 5:42 PM
 * To change this template use File | Settings | File Templates.
 */

class SubSystemOne
{
    public function MethodOne()
    {
        echo "SubsSystemOne Method";
    }
}


class SubSystemTwo
{
    public function MethodTwo()
    {
        echo "SubSystemTwo Method";
    }
}


class SubSystemThree
{
    public function MethodThree()
    {
        echo "SubSystemThree Method";
    }
}

class SubSystemFour
{
    public function MethodFour()
    {
        echo "SubSystemFour Method";
    }
}


class Facade
{
    private $one;
    private $two;
    private $three;
    private $four;

    public function __construct()
    {
        $this->one = new SubSystemOne();
        $this->two = new SubSystemTwo();
        $this->three = new SubSystemThree();
        $this->four = new SubSystemFour();
    }


    public function MethodA()
    {
        echo "\n MethodA";
        $this->one->MethodOne();
        $this->two->MethodTwo();
        $this->four->MethodFour();
    }


    public function MethodB()
    {
        echo "\n MethodB";
        $this->two->MethodTwo();
        $this->three->MethodThree();

    }
}


// Run the test


$facade = new Facade();

echo "<pre>";
$facade->MethodA();
$facade->MethodB();
echo "</pre>";
