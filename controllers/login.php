<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of login
 *
 * @author Michal
 */
class Login extends BaseController{
    function __construct() {
        parent::__construct();
        parent::loadModel(get_class());
    }
    
    public function index(){
        $this->view->msg = 'Logowanie';
        $this->view->render('login/index');
    }
    
    public function result(){
        parent::loadModel(get_class());
        $this->model->login($_POST) ? $this->view->msg .= 'Pomyślnie zostałeś zalogowany.' : $this->view->msg .= 'Nie udało się zalogować.';
        $this->view->render('login/result');
    }
}
