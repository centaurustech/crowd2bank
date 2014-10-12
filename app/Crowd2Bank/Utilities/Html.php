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
        else if ( $targetDate == 'current' && $average >= 100 )
        {
            return 'sucessful';
        }        
        else
        {
            return $this->percentage($average);
        }
    }

    public function progressBar($targetDate, $average)
    {

        if ( $targetDate == 'current' )
        {
            if( $average >= 100 )
            {
                return 'progress-bar-success';
            }
            else
            {
                return '';
            }
        }
        else if ( $targetDate == 'completed' )
        {
            if( $average >= 100 )
            {
                return 'progress-bar-success';
            }
            else
            {
                return 'progress-bar-danger';
            }
        }
        else
        {
            return '';
        }
    }

    public function shortDescription($string)
    {
    	return substr($string, 0, 70) . '...';
    }
}