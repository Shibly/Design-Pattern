<?php

include_once("QuackBehavior.php");

class MuteQuack implements QuackBehavior{

	public function quack(){
		echo("<< Silence >>");
	}	
}

?>
