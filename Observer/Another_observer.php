<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shibly
 * Date: 8/1/13
 * Time: 2:12 AM
 * To change this template use File | Settings | File Templates.
 */

interface UserObserver
{
    public function update(User $subject);
}


class User
{
    protected $nickName;
    protected $observers = array();
    protected $status;

    public function __construct($nickName)
    {
        $this->nickName = $nickName;
    }

    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * Accepts an observer.
     */

    public function attach(UserObserver $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * Update the status of the users.
     */
    public function setStatus($text)
    {
        $this->status = $text;
        $this->notify();
    }

    public function getStatus()
    {
        return $this->status;
    }

    protected function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}


class TwitterStatusObserver implements UserObserver
{
    public function update(User $user)
    {
        $nickName = $user->getNickName();
        $status = $user->getStatus();
        echo "$nickName has changed its $status to \"$status\"\n";
    }
}


// Client code.

$user = new User("Shibly");
$user->attach(new TwitterStatusObserver());
$user->setStatus("Writing PHP code");