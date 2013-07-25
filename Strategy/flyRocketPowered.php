<?php

include_once("FlyBehavior.php");

class FlyRocketPowered implements FlyBehavior{

	public function fly(){
		echo("I'm flying with a rocket!");
	}	
}

?>
