<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of Database
 *
 * @author Michal
 */
class Database{
    protected $db;
    protected $data;
    
    public function __construct($data){
       if(is_array($data)){
           $this->data = $data;     
       }
       else{
           throw new Execption('Złe dane w konstruktorze.');
       }
       
       if(!isset($this->db) || $this->db == null){
            try{
                $this->db = new PDO($this->data['driver'] . 'dbname=' . $this->data['db_name'] . ';host=' . $this->data['host'], $this->data['user'], $this->data['password']);
            } 
            catch (PDOException $e){
                echo $e->getMessage();
            }
        }
    }
    
    public function get(){
        return $this->db;
    }
    
}