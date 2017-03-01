<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of Model
 *
 * @author Michal
 */
class BaseModel {
    public $msg = null;
    protected $pdo;
    
    public function __construct() {
        $this->db = new Database($GLOBALS['db']);
        $this->pdo = $this->db->get();
    }
}
