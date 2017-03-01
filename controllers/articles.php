<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of articles
 *
 * @author Michal
 */
class Articles extends BaseController{
    function __construct() {
        parent::__construct(); 
        parent::loadModel(get_class());
    }
    
    public function index(){
        $this->page(1);
    }
    
    public function page($page = null) {
		if($this->model != null){
			$this->view->data = $this->model->getPage($page);
			$this->view->render('articles/index');
		}
    }

    public function read($id){
        if(isset($id) && is_numeric($id)){
			if($this->view !== null && $this->model !== null){
				$this->view->data = $this->model->get($id); 
				$this->view->render('articles/read');
			}
        }
    }
	
	public function date($month){
		if(isset($month)){
			if($this->model != null){
				$this->view->data = $this->model->getArticlesByMonth($month);
				$this->view->render('articles/date');
			}
		}
    }
    
    public function addComment($id){    
		if($this->model !== null){
			$this->model->addComment($id, $_POST);
		}
        header('Location: '.$GLOBALS['base_url'].'articles/read/'.$id);
    }
    
    
}
