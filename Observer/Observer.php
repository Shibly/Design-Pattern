<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shibly
 * Date: 7/30/13
 * Time: 10:13 PM
 * To change this template use File | Settings | File Templates.
 */


interface Observer{
	function update(Subject $cd);
}

interface Subject{
	function attachObserver($type, Observer $observer);
	function notifyServer($type);
}


class CD implements Subject{
	public $title = '';
	public $band = '';

	private $observers = array();


	public function __construct($title,$band){
		$this->title = $title;
		$this->band = $band;
	}


	public function attachObserver($type, Observer $observer){
		$this->observers[$type][] = $observer;
	}

	public function notifyServer($type){
		if(isset($this->observers[$type])){
			foreach($this->observers[$type] as $observer){
				$observer->update($this);
			}
		}
	}


	public function buy(){
		$this->notifyServer('purchased');
	}

}



class buyCDObserver implements Observer{
	public function update( Subject $cd){
		$activity = "The CD named '{$cd->title}' by '$cd->band' was just purchased";
		echo $activity;
	}
}


// Some nasty tests.


$title = "A CD title";
$band = "A rock band";
$cd = new CD($title,$band);
$observer = new buyCDObserver();
$cd->attachObserver('purchased',$observer);
$cd->buy();

?>