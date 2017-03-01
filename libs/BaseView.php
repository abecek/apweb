<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of View
 *
 * @author Michal
 */
class BaseView {
	public $msg = null;
    public $data;
    
    public function render($name, $data = null){
        require_once 'views/header.php';
        require_once 'views/'. $name .'.php';
        require_once 'views/footer.php';
    }
}
