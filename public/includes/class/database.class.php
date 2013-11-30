<?php
class Database
{
    
    private $db;
    
    private $querys;
    
    private $lastquery;
    
    
    
    public function __construct()
    {
        try
        {
            $this->db = new PDO('mysql:dbname=dm;host=localhost', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e)
        {
            
            die('PDO Connection has failed<br />' . $e->getMessage());
        
            
        }
    }
    
    public function getDB()
    {
        return $this->db;
    }
    
    public function d_beingTransaction()
    {
        
        return $this->db->beginTransaction();
        
    }
    
    public function d_commit()
    {
        
        return $this->db->commit();
        
    }
    
    public function d_rollback($e = NULL)
    {
        if($e !== NULL)
            return $this->db->rollBack();
        
        return $e->getMessage();
        
    }
    
    public function d_query($sql, $param = NULL)
    {
        
        
        if($param === NULL)
        {
            $query = $this->db->query($sql);
            $trueQuery = $sql;
        }
        else
        {
            $query = $this->db->prepare($sql);

            $trueQuery = $sql;

            foreach($param as $key=>$value)
            {
                $trueQuery = str_replace($key, $value, $trueQuery);
            }
        }
        
        $query->execute($param);
        
        $this->querys[] = $trueQuery;
        $this->lastquery = $trueQuery;
        
        return $query;
        
    }
    
    public function getQuerys()
    {
        return var_dump($this->querys);
    }
    
    public function getLastQuery()
    {
        return var_dump($this->lastquery);
    }
    
}