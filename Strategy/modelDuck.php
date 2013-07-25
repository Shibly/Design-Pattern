<?php

include_once("flyNoWay.php");
include_once("quacker.php");
include_once("flyRocketPowered.php");


class ModelDuck extends Duck{
	public function __construct(){
		$this->flyBehavior = new FlyNoWay();
		$this->quackBehavior = new Quacker();
		echo("Model Duck being created");
	}
	
	public function display(){
		echo("I'm a model duck");
	}
}

?>