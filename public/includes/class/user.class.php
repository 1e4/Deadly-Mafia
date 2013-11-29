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
    
    public function __construct($db, $userid = NULL) {
        
        $this->userid   = $userid;
        $this->db       = $db;
        
        //If $userid == NULL the user isn't logged in, could be on the register page for example
        if($this->userid !== NULL)
        {
            
            $query = $this->db->d_query("SELECT * FROM users WHERE userid = :userid LIMIT 1", array('userid'=>$this->userid));
            
            $fetch = $query->fetch(PDO::FETCH_ASSOC);
            
            var_dump($fetch);
            
            
        }
        
    }
    
    
    /**
     * Checks if the user is logged in
     * $this->userid === NULL then the user isn't logged in
     * @return boolean
     */
    public function isLoggedIn()
    {
        
        if($this->userid === NULL)
        {
            return false;
        }
        
        return true;
        
    }
    
    /**
     * Direct the user to the logged in page
     */
    public function handleLoginCheck()
    {
        if($this->isLoggedIn())
            header('Location: ' . GameConfig::$site_url . 'powder.php');
    }
    
    public function login()
    {
        
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $email = $_POST['email'];
            $password = hash('sha512', $_POST['password']);
            $query = $this->db->d_query("SELECT id FROM users_master WHERE email = :email AND password = :password", 
                    array('email'=>$email, 'password'=>$password));
            
            if($query->fetchColumn() > 0)
            {
                //Set the session
                $_SESSION[GameConfig::getSessionName()] = $query->fetchColumn();
                
                //Update the user table with stats
                $date = Functions::date();
                
                try {
                    
                    $this->db->d_beginTransaction();
                    $this->db->d_query("UPDATE users SET lastonline = " . $date . " WHERE userid = " . $query->fetchColumn());
                    $this->db->d_query("INSERT INTO logs_login (`userid`, `ip`) VALUES ('{$query->fetchColumn()})', '{$_SERVER['REMOTE_ADDR']}')");
                    return true;
                    
                }catch (Exception $e)
                {
                    $this->db->d_rollback($e);
                    return false;
                }
            }
        }
        
        return false;
        
    }
    
}