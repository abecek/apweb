<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of panel
 *
 * @author Michal
 */
class panel extends BaseController{
    function __construct() {
        parent::loadModel(get_class());
        parent::__construct();
    }
	
    public function index($msg = null) {
        $this->view->render('panel/index');
        //header('Location: '.$GLOBALS['base_url']);
    }
    
    public function addArticle(){
        $this->view->data = $this->model->getAvailableCategories();
        $this->view->render('panel/newArticle');
    }
    
    public function editArticles($page = null){
        $this->view->data = $this->model->getArticles($page);
        $this->view->render('panel/editArticles');
    }
    
    public function result(){
        $id = $this->model->addArticle($_POST);
        header('Location: '.$GLOBALS['base_url'].'articles/read/'.$id);
    }
    
    public function edit($id){
        if(isset($id) && is_numeric($id)){
            $this->view->data = $this->model->getArticle($id);
            $this->view->cat = $this->model->getAvailableCategories();
            $this->view->render('panel/edit');
        }
    }
    
    public function editArticle(){
        $id = $this->model->editArticle($_POST);
        header('Location: '.$GLOBALS['base_url'].'panel/editArticles');
    }
    
    public function deleteArticle($id){
        $this->model->deleteArticle($id);
        header('Location: '.$GLOBALS['base_url'].'panel/editArticles');
    }
    
}
