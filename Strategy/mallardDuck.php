<?php

include_once("flyWithWings.php");
include_once("quacker.php");

class MallardDuck extends Duck{
	public function __construct(){
		$this->flyBehavior = new FlyWithWings();
		$this->quackBehavior = new Quacker();
		echo("Mallard Duck being created");
	}
	
	public function display(){
		echo("I'm a real Mallard duck");
	}
}

?>