<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of register
 *
 * @author Michal
 */
class Register extends BaseController{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->msg = 'Rejestracja';
        $this->view->render('register/index');
    }
    
    public function result(){
        parent::loadModel(get_class());
		if($this->model !== null){
			$this->view->msg .= $this->model->register($_POST);
			$this->view->render('register/result');
		}
    }
}
