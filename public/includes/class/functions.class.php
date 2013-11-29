<?php

class Functions
{
    
    public static function date()
    {
        
        $date = new DateTime;
        return $date->format('Y-m-d H:i:s');
        
    }
    
}