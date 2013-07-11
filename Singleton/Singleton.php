<?php

interface ISingleton {

    static function getInstance();
}

class Database extends PDO implements Singleton {

    private static $instance;

    private function __construct() {
        parent::__construct("mysql:host=localhost;dbname=database", "user", "password");
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function __clone() {
        die(__CLASS__ . "Class can't be instantiated. Please use the method called getInstance");
    }

}

// Usages


$db1 = Database::getInstance();
$db1->prepare("Select * from table");
// $db2 is the same instance of $db1
$db2 = Database::getInstance();
?>
