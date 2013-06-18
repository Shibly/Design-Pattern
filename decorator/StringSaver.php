<?php

/*  define 'StringSaver' class (this base class will be decorated
  later on)
 */

class StringSaver {

    private $path;
    private $str;

    public function __construct($path, $str) {
        $this->path = $path;
        $this->str = $str;
    }

    public function save() {
        if (!$fp = fopen($this->path, 'w')) {
            throw new Exception('Error opening string file');
        }
        fwrite($fp, $this->str);
        fclose($fp);
    }

    public function getPath() {
        return $this->path;
    }

    public function getString() {
        return $this->str;
    }

}

class StringDecorator {

    protected $stringSaver;
    public $str;

    // Pass StringSaver object to the constructor

    public function __construct(StringSaver $stringSaver) {
        $this->stringSaver = $stringSaver;
        $this->resetString();
    }

    // obtain string from 'StringSaver' object
    // thus the original property remains the same

    public function resetString() {
        $this->str = $this->stringSaver->getString();
    }

    public function displayString() {
        return $this->str;
    }

}

class StringUpperCaseDecorator extends StringDecorator {

    private $strDecorator;

    public function __construct(StringDecorator $strDecorator) {
        $this->strDecorator = $strDecorator;
    }

    public function upperCaseString() {
        $this->strDecorator->str = strtoupper($this->strDecorator->str);
    }

}

class StringLowerCaseDecorator extends StringDecorator {

    private $strDecorator;

    public function __construct(StringDecorator $strDecorator) {
        $this->strDecorator = $strDecorator;
    }

    public function lowerCaseString() {
        $this->strDecorator->str = strtolower($this->strDecorator->str);
    }

}

class StringReverseDecorator extends StringDecorator {

    private $strDecorator;

    public function __construct(StringDecorator $strDecorator) {
        $this->strDecorator = $strDecorator;
    }

    public function reverseString() {
        $this->strDecorator->str = strrev($this->strDecorator->str);
    }

}

// Test The code
// Instantiate the StringSaver object

$stringSaver = new StringSaver('strings/strings.txt', 'Hello World');

// Instantiate the StringDecorator object
$stringDecorator = new StringDecorator($stringSaver);

// Instantiate the StringUpperCaseDecorator object
$strUpperCaseDecorator = new StringUpperCaseDecorator($stringDecorator);

// Instantiate the StringReverseDecorator object
$strReverse = new StringReverseDecorator($stringDecorator);

// Instantiate the StringLowerCaseDecorator object
$strLowerCaseDecorator = new StringLowerCaseDecorator($stringDecorator);
echo "Original String is as follows: " . $stringDecorator->displayString() . "<br />";

// Convert the string to upperCase
$strUpperCaseDecorator->upperCaseString();
echo "String after using 'StringUpperCaseDecorator' object is as follows : " . $stringDecorator->displayString() . "<br />";

// Convert string to lowerCase
$strLowerCaseDecorator->lowerCaseString();
echo "String after using 'StringLowerCaseDecorator' object is as follows : " . $stringDecorator->displayString() . "<br />";

// Make the string Reverse
$strReverse->reverseString();
echo "String after using 'StringReverseDecorator' object is as follows : " . $stringDecorator->displayString() . "<br />";
?>
