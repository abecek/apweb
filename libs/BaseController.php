<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of BaseController
 *
 * @author Michal
 */
class BaseController {
	protected $view = null;
	protected $model = null;
	public $msg = null;

    public function __construct() {
        $this->view = new BaseView();
    }
    
    public function loadModel($name, $modelPath = 'models/') {
        $path = $modelPath . $name.'_model.php';
        $path = strtolower($path);
		
        if (file_exists($path)) {
            require_once $modelPath . strtolower($name) .'_model.php';
            $modelName = $name.'_Model';
            $this->model = new $modelName();
            return true;
        }
        else{
			$this->view['msg'] .= 'Nie można znaleźć scieżki do modelu.<br>';
            return false;
        }
    }

}
