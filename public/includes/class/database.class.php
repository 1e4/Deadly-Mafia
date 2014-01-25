<?php
class Database
{
    
    private $db;
    
    private $querys;
    
    private $lastquery;
    
    public $result;
    
    
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
    
    public function d_query($sql, $param = NULL, $arrayKey = false)
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
            
            $query->execute($param);
        }
        
        
               
        $this->querys[] = $trueQuery;
        $this->lastquery = $trueQuery;
        $fetch = $query->fetchAll(PDO::FETCH_OBJ);
        if(!$arrayKey)
            $this->result[] = $fetch;
        else
            $this->result[$arrayKey] = $fetch;
        
        return $fetch[0];
        
    }
    
    public function getResults()
    {
        return $this->result;
    }
    
    public function getQuerys()
    {
        return var_dump($this->querys);
    }
    
    public function getLastQuery()
    {
        return var_dump($this->lastquery);
    }
    
    public function __get($key)
    {
        if(array_key_exists($key, $this->result[0]))
            return $this->result[$key];
        
    }
    
    public function __set($name, $value)
    {
        $this->result[$name] = $value;
    }
    
}