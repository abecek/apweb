<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of index
 *
 * @author Michal
 */
class Index extends BaseController{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        parent::loadModel(get_class());
		if($this->view !== null && $this->model !== null){
			$this->view->data['slider'] = $this->model->getSliderArticles();
			$this->view->data['mostviewed'] = $this->model->getMostViewedArticles();
			$this->view->data['months'] = $this->model->getArticlesByMonth();
			$this->view->render('main/index');
		}
    }
}
