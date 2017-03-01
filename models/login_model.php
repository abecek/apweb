<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of login_model
 *
 * @author Michal
 */
class Login_Model extends BaseModel{
    
    function __construct() {
        parent::__construct();
    }
    
    public function login($data) {
        $zap = $this->pdo->prepare("SELECT id_user, rank, login FROM users WHERE login=:login AND password=:password");
        $zap->bindValue(":login", $data['login'], PDO::PARAM_STR);
        $zap->bindValue(":password", sha1($data['password']), PDO::PARAM_STR);
        $zap->execute();
        $user = $zap->fetchAll(PDO::FETCH_BOTH);
        $val = count($user);
        
        $this->msg .= $data['login'].'   '.sha1($data['password']).'<br>';
        
        if ($val == 1){
            $key = sha1("" . $_SERVER['HTTP_USER_AGENT'] . "" . $user[0] . "sool");

            Session::set('id_user', $user[0]['id_user']);
            Session::set('rank', $user[0]['rank']);
            Session::set('login', $user[0]['login']);
            Session::set('key', (string) $key);
            
            return true;
        } 
        else {
            return false;
        }
    }
}
