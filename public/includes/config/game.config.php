<?php

class GameConfig
{
    public static $session_prefix   = 'dm_';
    public static $session_name     = 'DeadlyMafia';
    public static $site_url         = 'http://dm.localhost/'; 
    
    public static function getSessionName()
    {
        return self::$session_prefix . self::$session_name;
    } 
           
    
}