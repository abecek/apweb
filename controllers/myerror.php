<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of error
 *
 * @author Michal
 */
class MyError extends BaseController {
    function __construct() {
        parent::__construct();
    }
	
    public function index($msg = null) {
        $msg != null ? $this->view->msg = $msg : null;
        $this->view->render('error/index');
    }

}
