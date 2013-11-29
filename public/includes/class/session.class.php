<?php
class Session
{
    
    private static $session_prefix = 'dm_';
    
    private static $user_session_array = array(
        'username', 
        'userid',
        'gender',
        'crimechance',
        'location'
    );
    
    private static $crew_session_array = array(
        'crew_id',
        'crew_name'
    );
    
    private static $timer_session_array = array(
        'last_crime',
        'last_gta',
        'last_travel',
        'last_ext',
        'last_food',
        'last_order',
        'last_oc',
        'last_bank',
        'last_attempted',
        'last_kill',
        'last_script_check',
        'last_drugs',
        'last_booze',
        'last_chase'
    );
    
    /**
     * Updates the session array with the $variable
     * @param string $session Session key to update
     * @param string $variable Session key to assign value to
     */
    public function update($session, $variable)
    {
        
        if(isset($_SESSION[self::$prefix . $session]))
        {
            $_SESSION[self::$prefix . $session] = $variable;
        }
        else
        {
            
        }
        
    }
    
}