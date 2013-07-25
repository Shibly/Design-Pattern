<?php

include_once("QuackBehavior.php");

class Quacker implements QuackBehavior{

	public function quack(){
		echo("Quack");
	}	
}

?>
