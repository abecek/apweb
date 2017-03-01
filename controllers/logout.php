<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of logout
 *
 * @author Michal
 */
class logout extends BaseController{
    function __construct() {
        parent::__construct();
    }
	
    public function index($msg = null) {
        Session::destroy();
        header('Location: '.$GLOBALS['base_url']);
    }
}
