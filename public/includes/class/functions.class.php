<?php

class Functions
{
    
    public static function date()
    {
        
        $date = new DateTime;
        return $date->format('Y-m-d H:i:s');
        
    }

    public static function timeLeft($time)
    {

        //What is the time now?
        $now = new DateTime();

        //Time passed into function
        $date = new DateTime($time);

        //Diff both vars above
        $diff = $now->diff($date);

        //If the date is inverted meaning it has already passed
        //Date will always be set unless this is invert
        if($diff->invert === 1)
            return '<font color="green">Ready</font>';

        //Checks years
        if($diff->y > 0)
            $aDate['y'] = $diff->y . " years";

        //Checks months
        if($diff->m > 0)
            $aDate['m'] = $diff->m . " months";

        //Checks days
        if($diff->d > 0)
            $aDate['d'] = $diff->d . " days";

        //Checks hours
        if($diff->h > 0)
            $aDate['h'] = $diff->h . " hours";

        //Checks minutes
        if($diff->i > 0)
            $aDate['i'] = $diff->i . " minutes";

        //Checks seconds
        if($diff->s > 0)
            $aDate['s'] = $diff->s . " seconds";

        //Append the date with " left"
        $aDate[] = ' left';

        //return the remaining time
        return implode(' ', $aDate);
    }
    
}