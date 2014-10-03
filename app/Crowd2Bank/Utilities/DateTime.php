<?php namespace Crowd2Bank\Utilities;

class DateTime {

    public function today()
    {
        return new \DateTime('today');
    }

    public function compareToday($date)
    {
        return ( $this->today() < $this->toTime($date) ) ? true : false;
    }

    public function toTime($string)
    {
        $date = strtotime($string);        
        return date('Y-M-d H:i:s', $date);
    }
}