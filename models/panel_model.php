<?php

/*
 *  Michał Błaszczyk
 */

/**
 * Description of panel_model
 *
 * @author Michal
 */
class Panel_Model extends BaseModel{
    function __construct() {
        parent::__construct();
    }
    
    public function getArticles($page) {
        $zap = $this->pdo->prepare("select count(id_article) from articles");
        $zap->execute();
        $wynik = $zap->fetch(PDO::FETCH_NUM);

        $limit = 5;
        $allpages = ceil($wynik[0] / $limit);

        if ($page != null) {
            if($page > 0) $page = $page - 1;
            else $page = 0;
        } else {
            $page = 0;
        }
        $from = $page * $limit;

        $zap2 = $this->pdo->prepare("select * from articles ORDER by 1 asc limit :page,:lim");
        $zap2->bindValue(":page", $from, PDO::PARAM_INT);
        $zap2->bindValue(":lim", $limit, PDO::PARAM_INT);
        $zap2->execute();
        
        $wynik = $zap2->fetchAll(PDO::FETCH_ASSOC);
        $GLOBALS['allpage'] = $allpages;
        return $wynik;
    }

    public function getAvailableCategories(){
        $zap = $this->pdo->prepare("SELECT * FROM categories ORDER BY 1 ASC");
        $zap->execute();
        $wynik = $zap->fetchAll(PDO::FETCH_ASSOC);
        
        return $wynik;
    }
    
    public function addArticle($data){
        $zap = $this->pdo->prepare("INSERT INTO articles(title, content, id_category, data) values(?,?,?, NOW())");
        $zap->execute(array($data['title'], $data['content'], $data['id_category']));
        
        return $this->pdo->lastInsertId();
    }
    
    public function getArticle($id){
        $zap = $this->pdo->prepare("SELECT * FROM articles WHERE id_article=?");
        $zap->execute(array($id));
        $wynik = $zap->fetch(PDO::FETCH_ASSOC);
        
        return $wynik;
    }
    
    public function editArticle($data){
        $zap = $this->pdo->prepare("UPDATE articles SET title=?, content=?, data=NOW(), id_category=? WHERE id_article=?");
        $zap->execute(array($data['title'], $data['content'], $data['id_category'], $data['id_article']));
        
        return $data['id_article'];
    }
    
    public function deleteArticle($id){
        $zap = $this->pdo->prepare("DELETE FROM articles WHERE id_article = ?");
        $zap->execute(array($id));  
    }
}
