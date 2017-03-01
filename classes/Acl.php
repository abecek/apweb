<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of Acl
 *
 * @author Michal
 */
class Acl {
    
    private $permisions = Array(
        'guest' => array('index', 'articles', 'contact', 'login', 'register'),
        'user' => array('index', 'articles', 'myprofile', 'contact', 'logout'),
        'admin' => array('index', 'articles', 'contact', 'panel', 'logout')
    );
        
    public function check($route, $user){
        $rank = 'guest';
        switch($user->getRank()){
            case 0:
                $rank = 'user';
                break;
            case 1:
                $rank = 'admin';
                break;
        }
        
        if(in_array($route, $this->permisions[$rank])){
            return true;
        }
        else{
            return false;
        }
    }
    
}
