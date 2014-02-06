<?php
/**
 * The past is a ghost, the future a dream. All we ever have is now. –Bill Cosby.
 * @author: Ian <brokenlust@live.co.uk>
 * @version 1
 * @package DeadlyMafia
 * @copyright Deadly Mafia 2014
 */

class Online {

    private $db;
    public $usersOnline;

    public function __construct($db)
    {

        $this->db = $db;

        $this->db->d_query("SELECT id, username, userlevel FROM users LEFT JOIN users_master ON users.masterid = master.id");

    }

    public function getResults()
    {
        return $this->re
    }

} 