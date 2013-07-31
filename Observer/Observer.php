<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shibly
 * Date: 7/30/13
 * Time: 10:13 PM
 * To change this template use File | Settings | File Templates.
 */


/**
 * The observer interface defines a notification protocol.
 */

interface Observer
{
    function update(Subject $cd);
}

/**
 * The subject interface defines a protocol to setup a collection of observers.
 */
interface Subject
{
    function attachObserver($type, Observer $observer);

    // function removeObserver($type, Observer $observer);
    function notifyServer($type);
}


/**
 * Class CD: The concrete subject that stores the observers and notifies them according the
 * contract. Usually when it's state changes.
 */

class CD implements Subject
{
    public $title = '';
    public $band = '';

    private $observers = array();


    public function __construct($title, $band)
    {
        $this->title = $title;
        $this->band = $band;
    }


    public function attachObserver($type, Observer $observer)
    {
        $this->observers[$type][] = $observer;
    }

    public function notifyServer($type)
    {
        if (isset($this->observers[$type])) {
            foreach ($this->observers[$type] as $observer) {
                $observer->update($this);
            }
        }
    }


    public function buy()
    {
        $this->notifyServer('purchased');
    }

}


/**
 * Class buyCDObserver: The concrete observer. Performs the business logic operations upon a
 */

class buyCDObserver implements Observer
{
    public function update(Subject $cd)
    {
        $activity = "The CD named '{$cd->title}' by '$cd->band' was just purchased";
        echo $activity;
    }
}


// Some nasty tests.


$title = "A CD title";
$band = "A rock band";
$cd = new CD($title, $band);
$observer = new buyCDObserver();
$cd->attachObserver('purchased', $observer);
$cd->buy();
?>