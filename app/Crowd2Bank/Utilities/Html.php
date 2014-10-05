<?php namespace Crowd2Bank\Utilities;

class Html {

    public function setCurrency($amount, $currency = 'us', $symbol = '$')
    {
        return $currency . $symbol . ' ' . $amount;
    }

    public function percentage($average)
    {
    	$average = ( $average >= 100 ) ? 100 : $average . '%';
        return $average;
    }

    public function status($targetDate, $average)
    {
        if ( $targetDate == 'completed' )
        {
            return ( $average >= 100 ) ? 'sucessful' : 'unsucessful';
        }
        else
        {
            return $this->percentage($average);
        }
    }

    public function progressBar($targetDate, $average)
    {
    	$not_completed = ( $targetDate == 'current' &&  $average <= 100 ) ? '' : 'progress-bar-danger';
    	$progress_bar  = ( $targetDate == 'completed' && $average >= 100 ) ? 'progress-bar-success' : $not_completed;
    	return $progress_bar;
    }

    public function shortDescription($string)
    {
    	return substr($string, 0, 70) . '...';
    }
}