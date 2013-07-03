<?php

final class Factory {

    public static function getDemo($name) {
        return new Demo($name);
    }

}

class Demo {
    
/**
 *
 * @var string 
 * @example Returns the name.
 */
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

}

// Testing

echo Factory::getDemo('name1')->name . '' . Factory::getDemo('name2')->name;
?>
