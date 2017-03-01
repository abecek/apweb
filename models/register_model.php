<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of register_model
 *
 * @author Michal
 */
class Register_Model extends BaseModel{
    
    function __construct() {
        parent::__construct();
    }
    
    public function register($data) {
        
        $email = trim($data['email']);
        $login = trim($data['login']);
        $password1 = trim($data['password1']);
        $password2 = trim($data['password2']);

        $this->msg = NULL;
        
        if (strlen($login) < 4) {
            $this->msg .= "Login jest zbyt krótki! <br/>";
        }
        if (strlen($password1) < 6) {
            $this->msg .= "Hasło powinno zawierać co najmniej 6 znaków! <br/>";
        }
        if ($password1 !== $password2) {
            $this->msg .= "Hasła nie są takie same! <br/>";
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === False) {
            $this->msg .= "Adres email jest niepoprawny! <br/>";
        }
        if (strlen($data['name']) > 25) {
            $this->msg .= "Imię jest zbyt długie! <br/>";
        }
        if (strlen($data['surname']) > 35) {
            $this->msg .= "Nazwisko jest zbyt długie! <br/>";
        }

        //2.Sprawdzanie danych w bazie login/email
        $zap = $this->pdo->prepare("SELECT login FROM `users` WHERE login=:login");
        $zap->bindValue(":login", $login, PDO::PARAM_STR);
        $zap->execute();
        $user1 = $zap->fetchAll(PDO::FETCH_COLUMN, 0);
        if (count($user1) > 0){
            $this->msg .= "Podany login jest już w bazie! <br />";
        }
        
        $zap2 = $this->pdo->prepare("SELECT email FROM `user` WHERE email=:email");
        $zap2->bindValue(":email", $email, PDO::PARAM_STR);
        $zap2->execute();
        $user2 = $zap2->fetchAll(PDO::FETCH_COLUMN, 0);
        if (count($user2) > 0){
            $this->msg .= "Podany adres email jest już w bazie! <br />";
        }

        if (empty($this->msg)) {
            $zap3 = $this->pdo->prepare("INSERT INTO users (login, email, password, name, surname, data) VALUES (:login, :email, :password, :name, :surname, NOW())");
            $zap3->bindValue(":login", $login, PDO::PARAM_STR);
            $zap3->bindValue(":password", sha1($password1), PDO::PARAM_STR);
            $zap3->bindValue(":email", $email, PDO::PARAM_STR);
            $zap3->bindValue(":name", $data['name'], PDO::PARAM_STR);
            $zap3->bindValue(":surname", $data['surname'], PDO::PARAM_STR);
            $zap3->execute();

            $id = $this->pdo->lastInsertId();
        }
        return $this->msg;
    }
    
}
