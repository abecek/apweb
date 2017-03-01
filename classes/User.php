<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of User
 *
 * @author Michal
 */
class User {
    protected $pdo;
    protected $msg;
    
    private $id;
    private $login;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $data;
            
    private $rank;

    public function __construct($pdo, $id){
        if (isset($id) && is_numeric($id)){
            $this->pdo =$pdo;
            $zap = $this->pdo->prepare("SELECT * FROM users WHERE id_user = :id");
            $zap->bindValue(":id", $id, PDO::PARAM_INT);
            $zap->execute();
            $wynik = $zap->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($wynik)){
                $this->id = $id;
                $this->login = $wynik['login'];
                $this->email = $wynik['email'];
                $this->password = $wynik['password'];
                $this->name = $wynik['name'];
                $this->surname = $wynik['surname'];
                $this->data = $wynik['data'];
                
                $this->rank = $wynik['rank'];
            }
            else{
                $this->msg = 'Nie ma uzytkownika od takim id. ';
                $this->rank = -1;
            }
        }
        else{
            $this->rank = -1;
            $this->msg = 'Złe id wejsciowe. ';
        }
        
        return $this->msg;
    }
    
    public function getRank(){
        return $this->rank;
    }
    
    public function isLoggedIn(){
        if($this->rank != -1){
            return true;
        }
        else{
            return false;
        }
    }
}
