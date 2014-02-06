<?php
/**
 * The past is a ghost, the future a dream. All we ever have is now. –Bill Cosby.
 * @author: Ian <brokenlust@live.co.uk>
 * @version 1
 * @package DeadlyMafia
 * @copyright Deadly Mafia 2014
 */
class GameConfig
{
    public static $session_prefix       = 'dm_';
    public static $session_userid       = 'userid';
    public static $session_masterid     = 'masterid';
    public static $session_facebookid   = 'facebook';
    public static $site_url             = 'http://dm.localhost/'; 
    public static $ssl_enabled          = 0;
       
    public static function setSessions(array $session)
    {
        $_SESSION[self::$session_prefix . self::$session_userid] = $session[0];
        $_SESSION[self::$session_prefix . self::$session_masterid] = $session[1];
    }
    public static function getUserID()
    {
        return $_SESSION[self::$session_prefix . self::$session_userid];
    }
    
    public static function getMasterID()
    {
        return $_SESSION[self::$session_prefix . self::$session_masterid];
    }
    
    public static function getFacebookID()
    {
        return $_SESSION[self::$session_prefix . self::$session_facebookid];
    }
    
    public static function hasLoginSessions()
    {
        if(isset($_SESSION[self::$session_prefix . self::$session_userid])
                && isset($_SESSION[self::$session_prefix . self::$session_masterid]))
                return true;

        return false;
    }
    
    public static function hasSSL()
    {
        
    }
           
    
}