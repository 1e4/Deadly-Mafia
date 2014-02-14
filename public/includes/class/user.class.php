<?php

class User
{
    
    /**
     * Contains the PDO connection to the database
     * @var mixed PDO Connection
     */
    private $db;
    
    /**
     * Users ID, NULL if not logged in
     * @var int|NULL
     */
    private $userid;
    
    public $results = array();
    
    private $users;
    
    public function __construct($db, $userid = NULL) {
        $this->userid   = $userid;
        $this->db       = $db;
        
        //If $userid == NULL the user isn't logged in, could be on the register page for example
        if(GameConfig::hasLoginSessions() && $userid == NULL)
        {
            
            $query = $this->db->d_query("SELECT * FROM users_master 
                LEFT JOIN
                users ON users_master.id = users.masterid
                LEFT JOIN
                users_timers ON users.id = users_timers.userid
                LEFT JOIN
                user_stats ON users.id = user_stats.id
                WHERE users.id = :userid LIMIT 1", array(':userid'=>GameConfig::getUserID()), 'users');
            $this->users = $this->db->getResults();
            
            
            
        }
        
    }
    
    public function get($var)
    {
        if(isset($this->users['users'][0]))
            return $this->users['users'][0]->$var;
        else
            return 'trying to get ' . $var;
    }
    
    
    /**
     * Checks if the user is logged in
     * $this->userid === NULL then the user isn't logged in
     * @return boolean
     */
    public function isLoggedIn()
    {
        
        if(GameConfig::hasLoginSessions())
            return true;
        
        return false;
        
    }
    
    /**
     * Direct the user to the logged in page
     */
    public function handleLoginCheck()
    {
        
        if(!$this->isLoggedIn())
        {
            header('Location: index.php');
        }
        
    }
    
    public function login()
    {
        
        $return = $this->_generic();
        GameConfig::setSessions(array($return['userid'], $return['masterid']));
        $date = Functions::date();
        try
        {
            $this->db->d_beingTransaction();
            $this->db->d_query("UPDATE users SET lastonline = '{$date}' WHERE userid = {$return['userid']})");
            $this->db->d_commit();
        }catch(Exception $e)
        {
            $this->db->d_rollback($e);
        }

    }
    
    private function _generic()
    {
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $email = $_POST['email'];
            $password = hash('sha512', $_POST['password']);
            $query = $this->db->d_query("SELECT COUNT(*) AS count, users.id, masterid FROM users_master LEFT JOIN users ON users_master.id = users.masterid WHERE email = :email AND password = :password LIMIT 1", 
                    array(':email'=>$email, ':password'=>$password));
            
//            var_dump($this->db->count);
            if($query->count == 1)
            {
                //Set the session
                GameConfig::setSessions(array($query->id, $query->masterid));
                
                //Update the user table with stats
                $date = Functions::date();
                try {
                    $this->db->d_beingTransaction();
                    $this->db->d_query("UPDATE users SET lastonline = " . $date . " WHERE userid = " . $query->id);
//                    $this->db->d_query("INSERT INTO logs_login (`userid`, `ip`) VALUES ('{$query->id})', '{$_SERVER['REMOTE_ADDR']}')");
                    $this->db->d_commit();
                }catch (Exception $e)
                {
                    $this->db->d_rollback($e);
                }
                
                return true;
                    
            }
        }
        return false;
    }
    
    public function getInboxCount()
    {
        return 5;
    }
    
    public function rank($rank = NULL)
    {
        if($rank === NULL)
        {
            $rank = $this->get('rank');
        }

        switch($rank)
        {
            case 1:
                return 'Scum';

            default:
                return 'Scum';
        }

    }
    
    public function location($loc = NULL)
    {
        if($loc === NULL)
        {
            $loc = $this->get('location');
        }
        
        switch($loc)
        {
            default:
                $state = 'England';
        }

        return $state;
    }
    
    public function __get($key)
    {
        if(array_key_exists($key, $this->results))
                return $this->results[$key];
    }
    
    public function __set($name, $value)
    {
        $this->result[$name] = $value;
    }
    
}