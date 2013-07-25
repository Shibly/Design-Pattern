<?php

include_once("duck.php");
include_once("mallardDuck.php");
include_once("modelDuck.php");

	class MiniDuckSimulator{
		public static function main(){
			echo("<h2>Mallard Duck</h2><br />");
			$mallard = new MallardDuck();
			echo ("<br />");
			$mallard->display();
			echo ("<br />");
			$mallard->performFly();
			echo ("<br />");
			$mallard->performQuack();
			
			
			echo("<h2>Model Duck</h2><br />");
			$model = new ModelDuck();
			echo ("<br />");
			$model->display();
			echo ("<br />");
			$model->performFly();
			echo ("<br />");
			$model->setFlyBehavior(new FlyRocketPowered());
			$model->performFly();
		}
	}
	
	MiniDuckSimulator::main();

?>