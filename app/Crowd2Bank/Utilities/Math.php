<?php namespace Crowd2Bank\Utilities;

class Math {

    public function average($base, $dividend)
    {
    	$result = ($base / $dividend) * 100;
        return round($result);
    }

}