<?php

/**
 * Description of AbstractFactory
 *
 * @author Shibly
 */
abstract class AbstractPhoneFactory {

    abstract function makeAndroidPhone();

    abstract function makeWindowsPhone();
}

class SamsungFactory extends AbstractPhoneFactory {

    // private $context = "Mobile Phone";

    public function makeAndroidPhone() {
        return new AndroidPhone();
    }

    public function makeWindowsPhone() {
        return new WindowsPhone();
    }

}

class AndroidPhone {

    private $model;
    private $androidVersion;

    public function __construct() {
        $this->model = "Galaxy S3";
        $this->androidVersion = "Jelly Bean";
    }

    public function getModel() {
        return $this->model;
    }

    public function getVersion() {
        return $this->androidVersion;
    }

}

class WindowsPhone {

    private $model;
    private $windowsVersion;

    public function __construct() {
        $this->model = "Ativ";
        $this->windowsVersion = "Windows Phone 8";
    }

    public function getModel() {
        return $this->model;
    }

    public function getVersion() {
        return $this->windowsVersion;
    }

}

/**
 * Let's run some test to make sure our abstract factory works well :)
 */
writeln('BEGIN TESTING ABSTRACT FACTORY PATTERN');
writeln('');
writeln('TESTING SAMSUNG FACTORY');
writeln('');
$androidPhoneInstance = new SamsungFactory();
testConcreteFactory($androidPhoneInstance);
writeln('');

function testConcreteFactory($mobileFactoryInstance) {
    $androidPhone = $mobileFactoryInstance->makeAndroidPhone();
    writeLn(("Android Phone's Model is : ") . $androidPhone->getModel());
    writeLn(("Android Version is : ") . $androidPhone->getVersion());

    $windowsPhone = $mobileFactoryInstance->makeWindowsPhone();
    writeLn(("Windows Phone's Model is : ") . $windowsPhone->getModel());
    writeLn(("Windows Version is : ") . $windowsPhone->getVersion());
}

function writeLn($line_in) {
    echo $line_in . "<br/>";
}

?>
